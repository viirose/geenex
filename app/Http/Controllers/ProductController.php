<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilderTrait;
use Auth;
use Image;

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
        $records = Conf::where('level', 2)
                        ->where('type', 'parts')
                        ->with(['subs' => function ($query){
                            $query->whereHas('products', function ($q) {
                                // $q->where('content', 'like', 'foo%');
                            });
                            $query->withCount('products');
                        }])
                        ->get();

        $products = Product::where('show', true)

                            ->get();

        // print_r($products);
        // foreach ($records as $k) {
        //     echo $k->key;
        //     foreach ($k->subs as $j) {
        //         echo "--".$j->key.'@'.$j->products_count."<br>";
        //     }
        //     echo "<br>";
        // }
        return view('products.list');

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

        Image::make($img)->insert('img/watermark.png')->save('storage/app/img/'.$id.'.jpg', 100);

        $exists->update(['img' => true]);

        echo '200';
    }


    /**
     * 
     *
     */
}























