<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Login
     *
     */
    public function login()
    {
        return view('form');
    }
}
