<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class ContactForm extends Form
{
    private function val($array, $key)
    {
        return isset($array) && count($array) && array_key_exists($key, $array) ? $array[$key] : null;
    }

    // form
    public function buildForm()
    {
        if($this->getData('contact')) $contact = $this->getData('contact');

        $this
        ->add('1_alutation', 'select', [
            'label' => "Salutation*",
            'choices' => ['Mr.' => "Mr.", 'Mrs.' => "Mrs"],
            'default_value' => $this->val($contact, '1_alutation'),
            'rules' => 'required'
        ])
        // ->add('title', 'text', [
        //     'label' => 'Title',
        //     'rules' => 'min:3|max:50'
        // ])
        ->add('2_first_name', 'text', [
            'label' => 'First name*',
            'default_value' => $this->val($contact, '2_first_name'),
            'rules' => 'required|min:2|max:32'
        ])
        ->add('3_last_name', 'text', [
            'label' => 'Last name*',
            'default_value' => $this->val($contact, '3_last_name'),
            'rules' => 'required|min:2|max:32'
        ])
        ->add('4_company', 'text', [
            'label' => 'Company',
            'default_value' => $this->val($contact, '4_company'),
            'rules' => 'min:2|max:200'
        ])
        ->add('5_phone', 'text', [
            'label' => 'Telephone*',
            'default_value' => $this->val($contact, '5_phone'),
            'rules' => 'min:2|max:20'
        ])
        ->add('6_street', 'text', [
            'label' => 'Street Address*',
            'default_value' => $this->val($contact, '6_street'),
            'rules' => 'required|min:2|max:32'
        ])
        ->add('7_city', 'text', [
            'label' => 'City*',
            'default_value' => $this->val($contact, '7_city'),
            'rules' => 'required|min:2|max:32'
        ])
        ->add('8_post_code', 'text', [
            'label' => 'Post Code*',
            'default_value' => $this->val($contact, '8_post_code'),
            'rules' => 'required|min:2|max:32'
        ])
        ->add('9_country', 'text', [
            'label' => 'Country*',
            'default_value' => $this->val($contact, '9_country'),
            'rules' => 'required|min:2|max:32'
        ])
        
        // ->add('email', 'text', [
        //     'label' => 'Email*',
        //     'rules' => 'required|email'
        // ])
        ->add('url', 'text', [
            'label' => 'Internet URL ',
            'default_value' => $this->val($contact, 'url'),
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



