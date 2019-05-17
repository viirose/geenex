<?php

namespace App\Helpers;

use Session;
use App\Conf;
use App\Product;

/**
 * Filter
 *
 */
class Filter
{

    private $keywords;

    function __construct()
    {
        $this->keywords = Session::has('keywords') ? trim(session('keywords')) : '';
    }
    
    /**
     * fit
     *
     * 不区分大小写
     *
     */
    public function fit($text, $keyName=0)
    {
        if(!$keyName == 0) $this->keywords = Session::has($keyName) ? trim(session($keyName)) : '';

        return str_ireplace($this->keywords, '<strong class="text-warning">'.$this->keywords.'</strong>', $text);
    }

    /**
     * show conf
     *
     */
     public function showConf($id)
     {
        if(is_array($id) && Session::has('search_level_id')) {
            $target = Conf::findOrFail(session('search_level_id'));
        }else{
            $target = Conf::findOrFail($id);
        }

        return $target->key;
     }

    /**
     * show json
     *
     */
    public function show($json, $key, $flag=0) 
    {
        try {
            $arr = json_decode($json);
            if($arr && array_key_exists($key, $arr)){
                return $arr->$key;
            } else {
                return $flag === 0 ? null : $flag;
            }

        } catch (Exception $e) {
            return $flag === 0 ? null : $flag;
            exit();
        }

    }

    /**
     * 获取咨询列表文件
     *
     */
    public function getProducts($json)
    {
        $product_ids = json_decode($json, true);

        $recrods = Product::whereIn('id', $product_ids)
                            ->get();
        $out = '';

        foreach ($recrods as $recrod) {
            $out .= '<a href="/products/show/'.$recrod->id.'" class="badge badge-info">'.$recrod->name.'</a> &nbsp';
        }

        return $out;

    }
    
    /**
     * 获取咨询列表文件
     *
     */
    public function getContact($key)
    {
        $arr = explode('_', $key);

        $num = count($arr);

        switch ($num) {
            case 1:
                return $arr[0];
                break;

            case 2:
                return $arr[1];
                break;

            case 3:
                return $arr[1].' '.$arr[2];
                break;
            
            default:
                # code...
                break;
        }

        return null;
    }

}





















