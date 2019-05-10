<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

use App\Conf;

class UserForm extends Form
{
    private function brands()
    {
        $array = Conf::where('type', 'brand')
                        ->pluck('id', 'key')
                        ->toArray();
        return $array;
    }

    public function buildForm()
    {
        $brands = $this->brands();

        $this
        ->add('email', 'email', [
            'label' => 'Email*',
            'rules' => 'required|max:50'
        ])
        ->add('name', 'text', [
            'label' => 'Name',
            'rules' => 'min:2|max:20'
        ]);

        foreach ($brands as $key => $value) {

            $this->add($value, 'checkbox', [
                'value' => $key,
                'label' => $key,
                'checked' => false
            ]);
        }

        // ->add('spare', 'checkbox', [
        //     'value' => 1,
        //     'label' => "for Spare Parts!",
        //     'checked' => false
        // ])
        
        $this
        ->add('submit','submit',[
            'label' => 'OK',
            'attr' => ['class' => 'btn btn-primary btn-block']
        ]);
    }
}
