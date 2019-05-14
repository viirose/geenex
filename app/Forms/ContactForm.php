<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class ContactForm extends Form
{
    // form
    public function buildForm()
    {
        $this
        ->add('salutation', 'select', [
            'label' => "Salutation*",
            'choices' => ['Mr.' => "Mr.", 'Mrs.' => "Mrs"],
            'rules' => 'required'
        ])
        // ->add('title', 'text', [
        //     'label' => 'Title',
        //     'rules' => 'min:3|max:50'
        // ])
        ->add('first_name', 'text', [
            'label' => 'First name*',
            'rules' => 'required|min:2|max:32'
        ])
        ->add('last_name', 'text', [
            'label' => 'Last name*',
            'rules' => 'required|min:2|max:32'
        ])
        ->add('company', 'text', [
            'label' => 'Company',
            'rules' => 'min:2|max:200'
        ])
        ->add('phone', 'text', [
            'label' => 'Telephone*',
            'rules' => 'min:2|max:20'
        ])
        ->add('street', 'text', [
            'label' => 'Street Address*',
            'rules' => 'required|min:2|max:32'
        ])
        ->add('city', 'text', [
            'label' => 'City*',
            'rules' => 'required|min:2|max:32'
        ])
        ->add('post_code', 'text', [
            'label' => 'Post Code*',
            'rules' => 'required|min:2|max:32'
        ])
        ->add('country', 'text', [
            'label' => 'Country*',
            'rules' => 'required|min:2|max:32'
        ])
        
        // ->add('email', 'text', [
        //     'label' => 'Email*',
        //     'rules' => 'required|email'
        // ])
        ->add('url', 'text', [
            'label' => 'Internet URL ',
            'rules' => 'min:2|max:200'
        ])
        // ->add('content', 'textarea', [
        //     'label' => 'Favorites',
        //     'rules' => 'min:2|max:200'
        // ])
        ->add('submit','submit',[
            'label' => 'OK',
            'attr' => ['class' => 'btn btn-primary btn-block']
        ]);
    }
}



