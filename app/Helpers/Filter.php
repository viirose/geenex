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
        return str_replace($this->keywords, '<strong class="text-warning">'.$this->keywords.'</strong>', $text);
    }

     /**
     * show conf
     *
     */
     public function showConf($id)
     {
        if(is_array($id)) {
            $target = Conf::findOrFail($id[0])->master;
        }else{
            $target = Conf::findOrFail($id);
        }

        return $target->key;
     }

}

