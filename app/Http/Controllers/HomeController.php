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
                ->cc('djj3334@126.com')
                ->send(new QuickMail($request));

        $text = 'your email has been send successfully!';
        $color = 'success';
        $icon = 'paper-plane-o';
        return view('note', compact('text', 'color', 'icon'));
    }
}
