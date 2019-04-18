<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    /**
     * Login
     *
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
