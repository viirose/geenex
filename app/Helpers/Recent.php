<?php

namespace App\Helpers;

use Auth;

use App\Product;
use App\User;

/**
 * 最近浏览 
 *
 */
class Recent
{
    private $recent_array;
    private $limit;

    function __construct()
    {
        $this->limit = 5;

        $info = Auth::user()->info;

        $info_array = json_decode($info, true);

        $this->recent_array = $info && $info_array && isset($info_array['recent']) ? $info_array['recent'] : []; 
    }


    /**
     * 显示
     *
     */
    public function show()
    {
        $arr = Product::whereIn('id', $this->recent_array)
                            ->pluck('name', 'id') 
                            ->toArray();
        // return $arr;
        $out = [];
        if(count($arr)) {
            for ($i=0; $i < count($arr); $i++) { 
                if(isset($this->recent_array[$i])) $out = array_add($out, $this->recent_array[$i], $arr[$this->recent_array[$i]]);
            }
        }

        return $out;
    }


    /**
     * 增加
     *
     */
    public function add($id)
    {
        if(!in_array($id, $this->recent_array)) {
            array_unshift($this->recent_array, $id);
            if(count($this->recent_array) > $this->limit) array_pop($this->recent_array);

        }else{
            array_splice($this->recent_array, array_search($id, $this->recent_array), 1);
            array_unshift($this->recent_array, $id);
        }

        Auth::user()->update([
            'info->recent' => $this->recent_array,
        ]);
    }


    /**
     * 清除
     *
     */
    public function clear()
    {
        Auth::user()->update([
            'info->recent' => [],
        ]);
    }



}




















