<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilderTrait;
use Illuminate\Support\Facades\Storage;
use Auth;
use Image;
use Session;

use App\Product;
use App\Conf;
use App\Forms\ProductForm;
use App\Helpers\Role;

class ProductController extends Controller
{
    use FormBuilderTrait;

    /**
     * Products
     *
     */
    public function index()
    { 
        $categories = Conf::where('level', 1)
                        ->where('type', 'category')
                        ->with(['subs' => function ($query){

                            $query->whereHas('products', function ($q1) {
                                if(Session::has('search_category_id')) {
                                    $q1->where('category_id', session('search_category_id'));
                                }
                            });
                            $query->whereHas('products', function ($q2) {
                                // search_brand_id
                                if(Session::has('search_brand_id')) {
                                    $q2->where('brand_id', session('search_brand_id'));
                                }
                            });
                            $query->whereHas('products', function ($q3) {
                                // search_level
                                if(Session::has('search_level')) {
                                    $q3->whereIn('category_id', session('search_level'));
                                }
                            });
                            $query->whereHas('products', function ($q4) {
                                // 有图片
                                $q4->whereNotNull('img');
                            });

                            $query->whereHas('products', function ($q) {

                                // keywords
                                if(Session::has('keywords') && trim(session('keywords')) != '') {

                                    $q->whereRaw('upper(part_no) like upper(?)', ['%'.session('keywords').'%'])
                                      ->orWhereRaw('upper(name) like upper(?)', ['%'.session('keywords').'%'])
                                      ->orWhereRaw('upper(remark) like upper(?)', ['%'.session('keywords').'%'])
                                      ->orWhereRaw('upper(content) like upper(?)', ['%'.session('keywords').'%']);
                                }
                            });
                            
                            $query->withCount('products');

                        }])
                        ->get();



        // foreach ($categories as $c) {
        //     $c->level2_count = 0;
        //     $c->level2_count += $c->products_count;
        // }




        $brands = Conf::where('type', 'brand')
                        ->whereHas('brand_products', function ($q1) {
                            if(Session::has('search_category_id')) {
                                $q1->where('category_id', session('search_category_id'));
                            }
                        })
                        ->whereHas('brand_products', function ($q2) {
                            // search_brand_id
                            if(Session::has('search_brand_id')) {
                                $q2->where('brand_id', session('search_brand_id'));
                            }
                        })
                        ->whereHas('brand_products', function ($q3) {
                            // search_level
                            if(Session::has('search_level')) {
                                $q3->whereIn('category_id', session('search_level'));
                            }
                        })
                        ->whereHas('brand_products', function ($q4) {
                            // 有图片
                            $q4->whereNotNull('img');
                        })
                        ->whereHas('brand_products', function ($q) {

                            // keywords
                            if(Session::has('keywords') && trim(session('keywords')) != '') {

                                $q->whereRaw('upper(part_no) like upper(?)', ['%'.session('keywords').'%'])
                                      ->orWhereRaw('upper(name) like upper(?)', ['%'.session('keywords').'%'])
                                      ->orWhereRaw('upper(remark) like upper(?)', ['%'.session('keywords').'%'])
                                      ->orWhereRaw('upper(content) like upper(?)', ['%'.session('keywords').'%']);
                            }

                        })
                        ->withCount('brand_products')
                        ->get();

        $products = Product::whereNotNull('img')
                            ->where(function ($q1) {
                                // search_category_id
                                if(Session::has('search_category_id')) {
                                    $q1->where('category_id', session('search_category_id'));
                                }
                            })
                            ->where(function ($q2) {
                                // search_brand_id
                                if(Session::has('search_brand_id')) {
                                    $q2->where('brand_id', session('search_brand_id'));
                                }
                            })
                            ->where(function ($q3) {
                                // search_level
                                if(Session::has('search_level')) {
                                    $q3->whereIn('category_id', session('search_level'));
                                }
                            })
                            ->where(function ($q) {

                                // keywords
                                if(Session::has('keywords') && trim(session('keywords')) != '') {
                                    
                                    // 不区分大小写
                                    $q->whereRaw('upper(part_no) like upper(?)', ['%'.session('keywords').'%'])
                                      ->orWhereRaw('upper(name) like upper(?)', ['%'.session('keywords').'%'])
                                      ->orWhereRaw('upper(remark) like upper(?)', ['%'.session('keywords').'%'])
                                      ->orWhereRaw('upper(content) like upper(?)', ['%'.session('keywords').'%']);

                                    // $q->Where('part_no', 'like', '%'.session('keywords').'%')
                                    //   ->orWhere('name', 'like', '%'.session('keywords').'%')
                                    //   ->orWhere('remark', 'like', '%'.session('keywords').'%')
                                    //   ->orWhere('content', 'like', '%'.session('keywords').'%');
                                }
                            })

                            ->paginate(30);

        return view('products.all', compact('categories', 'brands', 'products'));

    }

    public function showCategory($id)
    {
        # code...
    }


    /**
     * 关键词
     *
     */
    public function search(Request $request)
    {
        session(['keywords' => $request->keywords]);

        return $this->index();
    }

    /**
     * 类别查询
     *
     */
    public function searchType($type, $id)
    {
        switch ($type) {
            case 'level1':
                $level_2 = Conf::where('parent_id', $id)
                                ->pluck('id')
                                ->toArray();

                $array = Conf::whereIn('parent_id', $level_2)
                                ->pluck('id')
                                ->toArray();

                $this->clearSession('search_category_id#search_brand_id#keywords');

                session(['search_level' => $array]);
                session(['search_level_id' => $id]);
                break;

            case 'level2':
                $array = Conf::where('parent_id', $id)
                                ->pluck('id')
                                ->toArray();

                $this->clearSession('search_category_id#search_brand_id#keywords');

                session(['search_level' => $array]);
                session(['search_level_id' => $id]);
                break;

            case 'category':
                session(['search_category_id' => $id]);
                break;

            case 'brand':
                session(['search_brand_id' => $id]);
                break;
            
            default:
                # code...
                break;
        }

        return $this->index();
    }


    /**
     * 清除session
     *
     */
    private function clearSession($string)
    {
        $limit = ['search_level','search_category_id', 'search_brand_id', 'keywords'];

        $array = explode('#', $string);

        if($string == 'all') $array = $limit;

        foreach ($array as $key) {
            if(Session::has($key)) Session::forget($key);
        }
    }

    /**
     * 清除查询条件
     *
     */
    public function searchClear($string)
    {
        
        $this->clearSession($string);
        return $this->index();
    }



    /**
     * create
     *
     */
    public function create(Role $role)
    {
        if(!$role->admin()) abort(403);

        $form = $this->form(ProductForm::class, [
            'method' => 'POST',
            'url' => '/products/store'
        ]);

        $title = '发布产品';
        $icon = 'cube';

        return view('form', compact('form','title','icon'));
    }

    /**
     * store
     *
     */
    public function store(Request $request, Role $role)
    {
        if(!$role->admin()) abort(403);

        $all = $request->all();

        $all['created_by'] = Auth::id();

        $record = Product::create($all);

        return view('img', compact('record'));
    }

    /**
     * edit
     *
     */
    public function edit(Role $role, $id)
    {
        if(!$role->admin()) abort(403);

        $record = Product::findOrFail($id);

        $form = $this->form(ProductForm::class, [
            'method' => 'POST',
            'model' => $record,
            'url' => '/products/update/'.$id
        ]);

        $title = '修改信息: '.$record->part_no;
        $icon = 'wrench';

        return view('form', compact('form','title','icon'));
    }


    /**
     * update
     *
     */
    public function update(Request $request, $id, Role $role)
    {
        if(!$role->admin()) abort(403);

        $all = $request->all();

        $record = Product::findOrFail($id);

        $record->update($all);

        return view('img', compact('record'));
    }

    /**
     * delete
     *
     */
    public function delete(Role $role, $id)
    {
        if(!$role->admin()) abort(403);

        $record = Product::findOrFail($id);
        if(!$record) abort('403');

        if($record->img) unlink($record->img);
        
        $record->delete();
        return redirect()->back();
    }

    /**
     * image store
     *
     */
    public function imgStore(Request $request, Role $role)
    {
        if(!$role->admin()) abort(403);
        
        $img = $request->file('avatar');
        $id = $request->id;
        // $extension = $img->getClientOriginalExtension();
        // Storage::disk('img')->put($id.'.'.$extension,  File::get($img));
        $exists = Product::find($id);
        if(!$exists) abort('404');

        $new_img = 'storage/app/img/'.$id.'-'.time().'.jpg';

        $image = Image::make($img)
                ->insert('img/guntleson_mark.png')
                ->save($new_img, 70);

        if($exists->img) unlink($exists->img);

        $exists->update(['img' => $new_img]);

        echo '200';
    }

    /**
     * 详情
     *
     */
    public function show($id)
    {
        $record = Product::findOrFail($id);

        return view('products.show', compact('record'));
    }


    /**
     * 
     *
     */
}























