<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class PubForm extends Form
{
        public function buildForm()
    {
        $this
        ->add('type', 'select', [
            'label' => "发布位置",
            'choices' => ['kcb' => "科创板", 'etf' => "50ETF"],
            'rules' => 'required'
        ])
        ->add('title', 'text', [
            'label' => '标题',
            'rules' => 'min:3|max:50'
        ])

        ->add('content', 'textarea', [
            'label' => '内容',
            'rules' => 'min:2|max:3000'
        ])
        ->add('submit','submit',[
            'label' => '发布',
            'attr' => ['class' => 'btn btn-primary btn-block']
        ]);
    }
}
