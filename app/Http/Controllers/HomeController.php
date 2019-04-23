<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Kris\LaravelFormBuilder\FormBuilderTrait;

use App\Forms\ContactForm;

class HomeController extends Controller
{
    use FormBuilderTrait;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $form = $this->form(ContactForm::class, [
            'method' => 'POST',
            'url' => '/users/save_password'
        ]);

        $title = 'Reset Password';
        $icon = 'key';

        return view('home', compact('form'));
    }
}
