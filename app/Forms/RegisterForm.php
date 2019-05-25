<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class RegisterForm extends Form
{
    public function buildForm()
    {
        $this

        // Personal Information

        ->add('c_1_salutation', 'select', [
            'label' => "Salutation*",
            'choices' => ['Mr.' => "Mr.", 'Mrs.' => "Mrs"],
            'rules' => 'required'
        ])
        ->add('c_2_first_name', 'text', [
            'label' => 'First name*',
            'rules' => 'required|min:2|max:32'
        ])
        ->add('c_3_last_name', 'text', [
            'label' => 'Last name*',
            'rules' => 'required|min:2|max:32'
        ])
        ->add('email', 'email', [
            'label' => 'Email Address*',
            'rules' => 'required'
        ])
        ->add('confirm_email', 'email', [
            'label' => 'Confirm Email Address*',
            'rules' => 'required'
        ])

        // Address Information

        ->add('c_4_company', 'text', [
            'label' => 'Company',
            'rules' => 'min:2|max:200'
        ])
        ->add('c_5_phone', 'text', [
            'label' => 'Telephone*',
            'rules' => 'min:2|max:20'
        ])
        ->add('c_6_street', 'text', [
            'label' => 'Street Address*',
            'rules' => 'required|min:2|max:32'
        ])
        ->add('c_7_city', 'text', [
            'label' => 'City*',
            'rules' => 'required|min:2|max:32'
        ])
        ->add('c_8_post_code', 'text', [
            'label' => 'Post Code*',
            'rules' => 'required|min:2|max:32'
        ])
        ->add('c_9_country', 'text', [
            'label' => 'Country*',
            'rules' => 'required|min:2|max:32'
        ])
        ->add('c_url', 'text', [
            'label' => 'Internet URL ',
            'rules' => 'min:2|max:200'
        ])

        // Login Information
        ->add('password', 'password', [
            'label' => 'Password*',
            'rules' => 'required|min:4|max:32'
        ])
        ->add('confirm_password', 'password', [
            'label' => 'Confirm Password*',
            'rules' => 'required|min:4|max:32'
        ])

        // btn
        ->add('submit','submit',[
            'label' => 'OK',
            'attr' => ['class' => 'btn btn-primary btn-block']
        ]);
    }
}
