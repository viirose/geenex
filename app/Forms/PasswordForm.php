<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class PasswordForm extends Form
{
    public function buildForm()
    {
     $this->add('password', 'password', [
            'label' => 'Password',
            'rules' => 'required|min:4|max:32'
        ])
        ->add('confirm_password', 'password', [
            'label' => 'Confirm Password',
            'rules' => 'required|min:4|max:32'
        ])
        ->add('submit','submit',[
              'label' => "OK",
              'attr' => ['class' => 'btn btn-success btn-block']
        ]);
    }
}
