<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class ProjectForm extends Form
{
    public function buildForm()
    {
        $this
        ->add('title', 'text', [
            'label' => '项目名',
            'rules' => 'required|min:3|max:50'
        ])
        ->add('content', 'textarea', [
            'label' => '介绍(1000字以内)',
            'rules' => 'min:2|max:1000'
        ])
        ->add('submit','submit',[
            'label' => '下一步',
            'attr' => ['class' => 'btn btn-success btn-block']
        ]);
    }
}
