<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Kris\LaravelFormBuilder\FormBuilderTrait;

use App\Forms\ContactForm;

class HomeController extends Controller
{
    use FormBuilderTrait;

    /**
     * home 
     *
     */
    public function index()
    {
        $form = $this->form(ContactForm::class, [
            'method' => 'POST',
            'url' => '/contact/send'
        ]);

        return view('home', compact('form'));
    }

    /**
     * Send mail
     *
     */
    public function send(Rquest $request)
    {
        # code...
    }
}
