<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Kris\LaravelFormBuilder\FormBuilderTrait;

use App\Forms\QuickContactForm;
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
        $form = $this->form(QuickContactForm::class, [
            'method' => 'POST',
            'url' => '/contact/quick'
        ]);

        return view('home', compact('form'));
    }

    /**
     * quick mail
     *
     */
    public function quick(Rquest $request)
    {
        # code...
    }
}
