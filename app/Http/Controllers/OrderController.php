<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Cart
     *
     */
    public function cart()
    {
        return view('cart');
    }
}
