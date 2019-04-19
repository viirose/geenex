<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * 新建
     * 
     */ 
    public function create($key, $parent_id)
    {
        if(trim($key) == '') abort('403');

        $ex = Conf::findOrFail($parent_id);
        if(!$ex) abort('403');


        $same_key = Conf::where('key', $key)->where('type', 'category')->first();

        if($same_key) {
           $text = 'key name: '.$key.' has already exsits!';
           return view('note', compact('text'));
        }

        Conf::create([
            'parent_id' => $parent_id,
            'level' => $ex->level + 1,
            'type' => 'category',
            'key' => $key,
        ]);

        return redirect()->back();
    }

    /**
     * 修改
     * 
     */ 
    public function edit($key, $id)
    {
        $ex = Conf::findOrFail($id);

        $same_key = Conf::where('key', $key)->where('type', $ex->type)->first();

        if($same_key) {
            $text = 'key name: '.$key.' has already exsits!';
            return view('note', compact('text'));
        }
        $ex->update(['key'=>$key]);
        
        return redirect()->back();
    }

    /**
     * 新品牌
     * 
     */
    public function brandCreate($key)
    {
        $same_key = Conf::where('key', $key)->where('type', 'brand')->first();

        if($same_key) {
            $text = 'key name: '.$key.' has already exsits!';
            return view('note', compact('text'));
        }

        Conf::create([
            'parent_id' => 1,
            'level' => 1,
            'type' => 'brand',
            'key' => $key,
        ]);

        return redirect()->back();

    }

    /**
     * 修改品牌
     * 
     */
    public function brandEdit($key, $id)
    {
        $ex = Conf::findOrFail($id);
        $same_key = Conf::where('key', $key)->where('type', 'brand')->first();

        if($same_key) {
            $text = 'key name: '.$key.' has already exsits!';
            return view('note', compact('text'));
        }

        $ex->update(['key' => $key]);
        
        return redirect()->back();
    }


    /**
     * 
     * 
     */ 
}





















