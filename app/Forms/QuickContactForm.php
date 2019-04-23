<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;
use Auth;

class QuickContactForm extends Form
{
    public function buildForm()
    {
        if(!Auth::check()){
            $this
            ->add('email', 'email', [
                'label' => 'Email*',
                'rules' => 'required'
            ]);
        }

        $this
        ->add('subject', 'text', [
            'label' => 'Subject',
            'rules' => 'min:2|max:200'
        ])
        ->add('message', 'textarea', [
            'label' => 'Message',
            'rules' => 'min:2|max:200'
        ])
        ->add('submit','submit',[
            'label' => 'OK',
            'attr' => ['class' => 'btn btn-primary btn-block']
        ]);
    }
}
