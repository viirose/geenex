<?php

namespace App\Http\Controllers;

use App\Conf;
use App\User;

use App\Helpers\Role;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class ConfController extends Controller
{

    /**
     * 标签
     *
     */
    public function brands(Role $role)
    {
        if(!$role->root()) abort('403');

        $records = Conf::where('type', 'brand')
                        // ->orderBy('key')
                        ->get();

        return view('conf.brands', compact('records'));
    }

    /**
     * 类型
     *
     */
    public function categories(Role $role)
    {
        if(!$role->root()) abort('403');

        $records = Conf::where('level',1)
                        ->where('type', 'category')
                        // ->latest()
                        ->get();

        return view('conf.categories', compact('records'));
    }

    /**
     * category handler
     *
     */
    public function categoryDo(Request $request, Role $role)
    {
        if(!$role->root()) abort('403');

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
    public function brandDo(Request $request, Role $role)
    {
        if(!$role->root()) abort('403');

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
     * ajax 返回选择信息
     *
     */
    public function categoryInfo($id)
    {
        $record = Conf::findOrFail($id);

        $level3 = $record->key;
        if(isset($record->master)) $level2 = $record->master->key;
        if(isset($record->master->master)) $level1 = $record->master->master->key;

        echo $level1.'-'.$level2.'-'.$level3;

    }

    /**
     * 删除
     *
     */
    public function delete($id, Role $role)
    {
        if(!$role->root()) abort('403');

        $record = Conf::findOrFail($id);

        if($record->subs->count() || $record->products->count()) abort('403');

        $record->delete();

        return redirect()->back();
    }


    /**
     * 删除品牌
     *
     */
    public function deleteBrand($id, Role $role)
    {
        if(!$role->root()) abort('403');

        $record = Conf::findOrFail($id);

        if($record->brand_products->count()) abort('403');

        $record->delete();

        return redirect()->back();
    }

    /**
     * 访问禁止
     *
     */
    public function visLock(Role $role)
    {
        if(!$role->root()) abort('403');

        $admin = User::find(2);
        $admin->update(['auth->vis' => false]);

        return redirect('/');
    }

    /**
     * 访问禁止
     *
     */
    public function visFree(Role $role)
    {
        if(!$role->root()) abort('403');

        $admin = User::find(2);
        $admin->update(['auth->vis' => true]);

        return redirect('/');
    }



    /**
     *
     *
     */
}





















