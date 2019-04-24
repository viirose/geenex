<?php

namespace App\Helpers;

use Session;

use App\Product;

/**
 * 邮件辅助工具 
 *
 */
class Mail
{

    public function productList()
    {
        if(Session::has('inquiries')){
            $records = Product::whereIn('id', session('inquiries'))->get();
            return $records;
        }

        return false;
    }

    // end
}