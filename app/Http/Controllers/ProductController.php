<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilderTrait;

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

        print_r($products);
        // foreach ($records as $k) {
        //     echo $k->key;
        //     foreach ($k->subs as $j) {
        //         echo "--".$j->key.'@'.$j->products_count."<br>";
        //     }
        //     echo "<br>";
        // }

    }

    /**
     * create
     *
     */
    public function create()
    {
        $form = $this->form(ProductForm::class, [
            'method' => 'POST',
            'url' => '/check'
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
        # code...
    }


    /**
     * 
     *
     */
}























