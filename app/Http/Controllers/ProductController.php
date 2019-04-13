<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Products
     *
     */
    public function index()
    {
        return view('products.list');
    }
}
