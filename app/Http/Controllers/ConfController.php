<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

use App\Conf;

class ConfController extends Controller
{
    /**
     * 标签
     * 
     */ 
    public function brands()
    {
        $records = Conf::where('type', 'brand')
                        ->orderBy('key')
                        ->get();

        return view('conf.brands', compact('records'));
    }

    /**
     * 类型
     * 
     */ 
    public function categories()
    {
        $records = Conf::where('level',1)
                        ->where('type', 'category')
                        ->latest()
                        ->get();

        return view('conf.categories', compact('records'));
    }

    /**
     * category handler
     * 
     */ 
    public function categoryDo(Request $request)
    {
        $new = [];
        if($request->name) $new = Arr::add($new, 'key', $request->name);
        if($request->code) $new = Arr::add($new, 'info->code', $request->code);

        if($request->id) {

            $record = Conf::findOrFail($request->id);
            if(count($new)) $record->update($new);

        }elseif(!$request->id && $request->parent_id){

            $parent = Conf::findOrFail($request->parent_id);

            $new = Arr::add($new, 'parent_id', $request->parent_id);
            $new = Arr::add($new, 'level', $parent->level + 1);
            $new = Arr::add($new, 'type', 'category');
            Conf::create($new);

        }

        return redirect()->back();
    }



    /**
     * brand handler
     * 
     */ 
    public function brandDo(Request $request)
    {
        $new = [];
        if($request->name) $new = Arr::add($new, 'key', $request->name);
        if($request->code) $new = Arr::add($new, 'info->code', $request->code);

        if($request->id) {

            $record = Conf::findOrFail($request->id);
            if(count($new)) $record->update($new);

        }else{

            $new = Arr::add($new, 'parent_id', 1);
            $new = Arr::add($new, 'level', 1);
            $new = Arr::add($new, 'type', 'brand');
            Conf::create($new);

        }

        return redirect()->back();
    }



    /**
     * 
     * 
     */ 
}





















