<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conf extends Model
{
    protected $guarded = [];

    // category
    public function products()
    {
        return $this->hasMany('App\Product', 'category_id', 'id');
    }

    // brands
    public function brand_products()
    {
        return $this->hasMany('App\Product', 'brand_id', 'id');
    }

    // 老板
    public function subs()
    {
        return $this->hasMany('App\Conf', 'parent_id', 'id');
    }

    // 老板
    public function master()
    {
        return $this->hasOne('App\Conf', 'id', 'parent_id');
        // return $this->blongsTo('App\Conf', 'parent_id', 'id');

    }


}
