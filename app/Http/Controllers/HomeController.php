<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Kris\LaravelFormBuilder\FormBuilderTrait;

use App\Forms\QuickContactForm;
use App\Mail\QuickMail;

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
    public function quick(Request $request)
    {
        Mail::to(config('mail.reply_to.address'))
                ->cc('309266143@qq.com')
                ->send(new QuickMail($request));

        $text = 'your email has been send successfully!';
        $color = 'success';
        $icon = 'paper-plane-o';
        return view('note', compact('text', 'color', 'icon'));
    }

    public function privacy()
    {
        return view("pages.privacy");
    }

    public function terms()
    {
        return view("pages.terms");
    }

    public function profile()
    {
        return view("pages.profile");
    }
}

























