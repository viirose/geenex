<?php

namespace App\Helpers;

use Auth;

use App\User;
use App\Org;
use App\Conf;


/**
 * 授权 
 *
 */
class Role
{

    // show
    public function show($json, $key) 
    {
        try {
            $arr = json_decode($json);
            return $arr && array_key_exists($key, $arr) ? $arr->$key : null;
        } catch (Exception $e) {
            return null;
            exit();
        }

    }

    // 存在并且为为true
    private function hasAndTrue($json, $key) 
    {
        $arr = json_decode($json);
        return $arr && array_key_exists($key, $arr) && $arr->$key == true ? true : false;
    }

    // 选择目标
    private function choose($id=0)
    {
        if (!Auth::check() && $id==0) return false;
        return $id == 0 ? Auth::user() : User::findOrFail($id);
    }

    /**
     * 账号锁定
     *
     */
    public function locked($id=0)
    {
        return $this->hasAndTrue($this->choose($id)->auth, 'locked');
    }

    /**
     * 邮件已认证
     *
     */
    public function emailVerified($id=0)
    {
        return $this->choose($id)->email_verified_at;
    }

    /**
     * 联系方式
     *
     */
    public function contactVerified($id=0)
    {
        return $this->choose($id)->contact_verified_at;
    }

    /**
     * root : 超级管理员
     *
     */
    public function root($id=0)
    {
        if(!$this->choose()) return false;
        return $this->hasAndTrue($this->choose($id)->auth, 'root');
    }

    /**
     * admin : 管理员
     *
     */
    public function admin($id=0)
    {
        if(!$this->choose()) return false;

        if($this->root($id)) return true;
        return $this->hasAndTrue($this->choose($id)->auth, 'admin');
    }

    /**
     * self : 自己
     *
     */
    public function self($id)
    {
        return Auth::id() == $id;
    }


    /**
     * spare
     *
     */
    public function spare($id=0)
    {
        if(!$this->choose()) return false;

        // if($this->admin($id)) return true;
        return $this->hasAndTrue($this->choose($id)->auth, 'spare');
    }

    /**
     * grater than : 有权
     *
     */
    public function gt($id)
    {
        if($this->root() && !$this->root($id)) return true;
        if($this->admin() && !$this->admin($id)) return true;
        return false;
    }


    /**
     * 品牌限制
     *
     */
    public function limit($id=0)
    {
        $user = $this->choose($id);

        $auth = json_decode($user->auth, true);

        return $auth && array_key_exists('limit', $auth) &&  is_array($auth['limit']) ? $auth['limit'] : [];
    }

    /**
     * 品牌限制
     *
     */
    public function limitIds($id=0)
    {
        $limit = $this->limit($id);

        if(!count($limit)) return [];

        $ids = array_keys($limit);
        $new = [];

        for ($i=0; $i < count($ids); $i++) { 
            array_push($new, intval($ids[$i]));
        }

        return $new;
    }

    public function unlimit($id=0)
    {
        $un = Conf::where('type', 'brand')
                    ->whereNotIn('id', $this->limitIds($id))
                    ->pluck('key', 'id')
                    ->toArray();
        return $un;
    }

    public function mustResetPassword($id=0)
    {
        $user = $this->choose($id);

        $auth = json_decode($user->auth, true);

        return $auth && array_key_exists('must_rest_password', $auth) &&  $auth['must_rest_password'] == true ? true : false;
    }

    public function needActive($id=0)
    {
        $user = $this->choose($id);

        $auth = json_decode($user->auth, true);

        return $auth && array_key_exists('need_active', $auth) &&  $auth['need_active'] == true ? true : false;
    }

}
















