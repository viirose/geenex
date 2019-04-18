<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    // // 老板
    // public function prats()
    // {
    //     return $this->belongsTo('App\Conf', 'id', 'info->part');
    // }
}
