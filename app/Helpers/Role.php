<?php

namespace App\Helpers;

use Auth;

use App\User;
use App\Org;


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

}
















