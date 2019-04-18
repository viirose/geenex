<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conf extends Model
{
    protected $guarded = [];

    // 老板
    public function products()
    {
        return $this->hasMany('App\Product', 'type_id', 'id');
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
    }


}
