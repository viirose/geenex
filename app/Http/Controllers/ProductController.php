<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilderTrait;
use Illuminate\Support\Facades\Storage;
use Auth;
use Image;
use Session;
use Mail;
use Illuminate\Support\Arr;
use Log;

use App\Product;
use App\Conf;
use App\Forms\ProductForm;
use App\Helpers\Role;
use App\Helpers\Recent;
use App\Mail\Share;

class ProductController extends Controller
{
    use FormBuilderTrait;

    private $limitIds;
    private $role;
    /**
     * Products
     *
     */
    public function index()
    {
        $this->role = new Role;

        // 没开放交通
        if(!$this->role->vis() && !Auth::check()) return redirect('/login');

        if(!$this->role->vis()) {
            $this->limitIds = $this->role->limitIds();
        }
        // Log::alert($this->limitIds);

        // session(['limits' => $this->role->limitIds()]);

        $categories = Conf::where('level', 1)
                        ->where('type', 'category')
                        ->with(['subs' => function ($query_1){
                            // $query_1->withCount('subs');
                            // $query_1->withCount(['subs' => function ($qc){
                            //     //
                            //     // return 100;

                            // }]);

                            $query_1->with(['subs' => function ($query){
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
                                $query->whereHas('products', function ($q5) {
                                    if(!$this->role->vis() && !$this->role->admin()) {
                                        $q5->whereIn('brand_id', $this->limitIds);
                                    }
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
                            }]);

                        }])
                        ->get();



        // foreach ($categories as $c) {
        //     $c->level2_count = 0;
        //     $c->level2_count += $c->products_count;
        // }




        $brands = Conf::where('type', 'brand')
                        ->where(function ($q5) {
                            // 品牌限制
                            if(!$this->role->vis() && !$this->role->admin()) {
                                $q5->whereIn('id', $this->limitIds);
                            }
                        })

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

        $pre = Product::whereNotNull('img')
                            ->where(function ($q5) {
                                // 品牌限制
                                if(!$this->role->vis() && !$this->role->admin()) {
                                    $q5->whereIn('brand_id', $this->limitIds);
                                }
                            })
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
                            });

        $all = $pre->count();

        $products = $pre->paginate(30);

        return view('products.all', compact('categories', 'brands', 'products','all'));

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
     * /products 跳转 /products/spares
     *
     */
    public function jump()
    {
        // if(!$this->role->vis() && !Auth::check()) return redirect('/login');

        return redirect('/products/spares');
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

        $title = 'Add a Product';
        $icon = 'cube';

        return view('form_product', compact('form','title','icon'));
    }

    /**
     * store
     *
     */
    public function store(Request $request, Role $role)
    {
        if(!$role->admin()) abort(403);

        if(!$request->category_id) return redirect()->back()->withErrors(['category_text'=>'please select!'])->withInput();

        $all = $request->except(['category_text']);

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

        $category_text = $record->category->master->master->key.'-'.$record->category->master->key.'-'.$record->category->key;

        $form = $this->form(ProductForm::class, [
            'method' => 'POST',
            'model' => $record,
            'data' => ['category_text' => $category_text],
            'url' => '/products/update/'.$id
        ]);

        $title = 'Edit: '.$record->part_no;
        $icon = 'wrench';

        return view('form_product', compact('form','title','icon'));
    }


    /**
     * update
     *
     */
    public function update(Request $request, $id, Role $role)
    {
        if(!$role->admin()) abort(403);

        if(!$request->category_id) return redirect()->back()->withErrors(['category_text'=>'please select!'])->withInput();

        $all = $request->except(['category_text']);

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
                ->insert('img/watermark.png')

                ->text('Part Nr. '.strtoupper($exists->part_no), 390, 50, function($font) {
                    $font->file('fonts/helvetica-light.otf');
                    $font->size(36);
                    $font->color('#fff');
                    $font->align('center');
                    $font->valign('top');
                })
                ->text('Part Nr. '.strtoupper($exists->part_no), 389, 49, function($font) {
                    $font->file('fonts/helvetica-light.otf');
                    $font->size(36);
                    $font->color('#000');
                    $font->align('center');
                    $font->valign('top');
                })
                ->save($new_img, 60);

        if($exists->img) unlink($exists->img);

        $exists->update(['img' => $new_img]);

        echo '200';
    }

    /**
     * show
     *
     */
    public function show($id, Recent $rc)
    {
        $record = Product::findOrFail($id);

        try {
            $rc->add($id);
        } catch (Exception $e) {
            // Log::info($e);
        }

        return view('products.show', compact('record'));
    }


    /**
     * token 提取
     *
     */
    public function share($id, $token)
    {
        $record = Product::findOrFail($id);

        if($record->token === $token) {
            return $this->show($id);
        }else{
            abort('403');
        }
    }

    /**
     * 邮件
     *
     */
    public function send(Request $request, Recent $rc)
    {
        $emails = explode("\n", $request->emails);

        // 单次限制数量
        $limit = 3;

        // 验证邮件
        if(!count($emails) || count($emails) > $limit) {
            $text = 'Support 1-3 email(s) one time!';
            $color = 'danger';
            $icon = 'at';
            return view('note', compact('text', 'color', 'icon'));
        }

        foreach ($emails as $email) {
            if(!filter_var(trim($email), FILTER_VALIDATE_EMAIL)) {
                $text = $email.' is not an available email!';
                $color = 'danger';
                $icon = 'at';
                return view('note', compact('text', 'color', 'icon'));
            }
        }

        // 生成token
        $record = Product::findOrFail($request->id);

        try {

            $rc->add($request->id);
        } catch (Exception $e) {

        }

        $token = $record->token;
        $url = config('app.url').'/products/share/'.$request->id.'/';

        if($token){
            $url .= $token;
        }else{
            $new_token = str_random(16);
            $record->update(['token' => $new_token]);
            $url .= $new_token;
        }

        $info = [
            'url' => $url,
            'part_no' => $record->part_no,
            'part_name' => $record->name,
            // 'to' => $request->email,
            'name' => Auth::user()->name,
            'from' => Auth::user()->email,
        ];

        $num = count($emails);

        switch ($num) {
            case 1:
                Mail::to(trim($emails[0]))
                    ->send(new Share($info));

                break;

            case 2:
                Mail::to(trim($emails[0]))
                    ->cc(trim($emails[1]))
                    ->send(new Share($info));

                break;

            case 3:
                Mail::to(trim($emails[0]))
                    ->cc(trim($emails[1]))
                    ->bcc(trim($emails[2]))
                    ->send(new Share($info));
                break;

            default:
                abort('403');
                break;
        }

        $text = 'A Product shared successfully!<br><a href="/products" class="btn btn-success btn-sm"> all products</a>';
        $color = 'success';
        $icon = 'user-o';
        return view('note', compact('text', 'color', 'icon'));

        return view('products.show', compact('record'));
    }


    /**
     *
     *
     */
}























