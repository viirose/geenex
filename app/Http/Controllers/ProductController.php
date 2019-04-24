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

class ProductController extends Controller
{
    use FormBuilderTrait;

    /**
     * Products
     *
     */
    public function index()
    { 
        $categories = Conf::where('level', 2)
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
                                // search_level2
                                if(Session::has('search_level2')) {
                                    $q3->whereIn('category_id', session('search_level2'));
                                }
                            });

                            $query->whereHas('products', function ($q) {

                                // 要有图片
                                $q->whereNotNull('img');

                                // keywords
                                if(Session::has('keywords') && trim(session('keywords')) != '') {

                                    $q->whereRaw('upper(part_no) like upper(?)', ['%'.session('keywords').'%'])
                                      ->orWhereRaw('upper(name) like upper(?)', ['%'.session('keywords').'%'])
                                      ->orWhereRaw('upper(remark) like upper(?)', ['%'.session('keywords').'%'])
                                      ->orWhereRaw('upper(content) like upper(?)', ['%'.session('keywords').'%']);

                                    // $q->where('part_no', 'like', '%'.session('keywords').'%')
                                    //   ->orWhere('name', 'like', '%'.session('keywords').'%')
                                    //   ->orWhere('remark', 'like', '%'.session('keywords').'%')
                                    //   ->orWhere('content', 'like', '%'.session('keywords').'%');
                                }


                            });

                            $query->withCount('products');
                        }])
                        ->get();

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
                            // search_level2
                            if(Session::has('search_level2')) {
                                $q3->whereIn('category_id', session('search_level2'));
                            }
                        })
                        ->whereHas('brand_products', function ($q) {

                            // 要有图片
                            $q->whereNotNull('img');

                            // keywords
                            if(Session::has('keywords') && trim(session('keywords')) != '') {

                                $q->whereRaw('upper(part_no) like upper(?)', ['%'.session('keywords').'%'])
                                      ->orWhereRaw('upper(name) like upper(?)', ['%'.session('keywords').'%'])
                                      ->orWhereRaw('upper(remark) like upper(?)', ['%'.session('keywords').'%'])
                                      ->orWhereRaw('upper(content) like upper(?)', ['%'.session('keywords').'%']);

                                // $q->where('part_no', 'like', '%'.session('keywords').'%')
                                //   ->orWhere('name', 'like', '%'.session('keywords').'%')
                                //   ->orWhere('remark', 'like', '%'.session('keywords').'%')
                                //   ->orWhere('content', 'like', '%'.session('keywords').'%');
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
                                // search_level2
                                if(Session::has('search_level2')) {
                                    $q3->whereIn('category_id', session('search_level2'));
                                }
                            })
                            ->where(function ($q) {

                                // keywords
                                if(Session::has('keywords') && trim(session('keywords')) != '') {

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
            case 'level2':
                $array = Conf::where('parent_id', $id)
                                ->pluck('id')
                                ->toArray();

                $this->clearSession('search_category_id#search_brand_id#keywords');

                session(['search_level2' => $array]);
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
        $limit = ['search_level2','search_category_id', 'search_brand_id', 'keywords'];

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
    public function create()
    {
        $form = $this->form(ProductForm::class, [
            'method' => 'POST',
            'url' => '/products/store'
        ]);

        $title = 'Add a Product';
        $icon = 'cube';

        return view('form', compact('form','title','icon'));
    }

    /**
     * store
     *
     */
    public function store(Request $request)
    {
        $all = $request->all();

        $all['created_by'] = Auth::id();

        $record = Product::create($all);

        return view('img', compact('record'));
    }

    /**
     * edit
     *
     */
    public function edit($id)
    {
        $record = Product::findOrFail($id);

        $form = $this->form(ProductForm::class, [
            'method' => 'POST',
            'model' => $record,
            'url' => '/products/update/'.$id
        ]);

        $title = 'Edit: '.$record->part_no;
        $icon = 'wrench';

        return view('form', compact('form','title','icon'));
    }


    /**
     * update
     *
     */
    public function update(Request $request, $id)
    {
        $all = $request->all();

        $record = Product::findOrFail($id);

        $record->update($all);

        return view('img', compact('record'));
    }

    /**
     * delete
     *
     */
    public function delete($id)
    {
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
    public function imgStore(Request $request)
    {
        $img = $request->file('avatar');
        $id = $request->id;
        // $extension = $img->getClientOriginalExtension();
        // Storage::disk('img')->put($id.'.'.$extension,  File::get($img));
        $exists = Product::find($id);
        if(!$exists) abort('404');

        $new_img = 'storage/app/img/'.$id.'-'.time().'.jpg';

        $image = Image::make($img)
                ->insert('img/watermark.png')

                ->text('#'.$exists->part_no, 370, 50, function($font) {
                    $font->file('fonts/helvetica-light.otf');
                    $font->size(50);
                    $font->color('#fff');
                    $font->align('center');
                    $font->valign('top');
                    // $font->angle(45);
                })
                ->text('#'.$exists->part_no, 369, 49, function($font) {
                    $font->file('fonts/helvetica-light.otf');
                    $font->size(50);
                    $font->color('#000');
                    $font->align('center');
                    $font->valign('top');
                    // $font->angle(45);
                })
                ->save($new_img, 50);

        if($exists->img) unlink($exists->img);

        $exists->update(['img' => $new_img]);

        echo '200';
    }


    /**
     * 
     *
     */
}























