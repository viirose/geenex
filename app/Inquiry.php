<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $guarded = [];

    // user
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    // // user
    // public function products()
    // {
    //     return $this->hasMany('App\Product', 'id', 'product_ids');
    // }

}
