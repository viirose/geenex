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
                'label' => '您的邮件*',
                'rules' => 'required'
            ]);
        }

        $this
        ->add('subject', 'text', [
            'label' => '标题',
            'rules' => 'min:2|max:200'
        ])
        ->add('message', 'textarea', [
            'label' => '咨询内容',
            'rules' => 'min:2|max:200'
        ])
        ->add('submit','submit',[
            'label' => '发送',
            'attr' => ['class' => 'btn btn-primary btn-block']
        ]);
    }
}
