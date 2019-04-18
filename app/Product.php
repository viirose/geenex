<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    // category
    public function category()
    {
        return $this->hasOne('App\Conf', 'id', 'category_id');
    }

    // brand
    public function brand()
    {
        return $this->hasOne('App\Conf', 'id', 'brand_id');
    }
}
