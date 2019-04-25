<?php

namespace App\Helpers;

use Session;
use App\Conf;

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
     */
    public function fit($text)
    {
        $text = strtoupper($text);

        return str_replace(strtoupper($this->keywords), '<strong class="text-warning">'.strtoupper($this->keywords).'</strong>', $text);
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

}





















