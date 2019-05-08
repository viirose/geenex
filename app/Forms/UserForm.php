<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class UserForm extends Form
{
    public function buildForm()
    {
        $this
        ->add('email', 'email', [
            'label' => 'Email*',
            'rules' => 'required|max:50'
        ])
        ->add('name', 'text', [
            'label' => 'Name',
            'rules' => 'min:2|max:20'
        ])
        ->add('spare', 'checkbox', [
            'value' => 1,
            'label' => "for Spare Parts!",
            'checked' => false
        ])

        ->add('submit','submit',[
            'label' => 'OK',
            'attr' => ['class' => 'btn btn-primary btn-block']
        ]);
    }
}
