<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;
use Illuminate\Support\Arr;

use App\Conf;

class ProductForm extends Form
{
    // category array
    // private function categoris()
    // {
    //     $records = Conf::where('type', 'category')
    //                     ->where('level', 3)
    //                     ->orderBy('key')
    //                     ->get();
    //                     // ->pluck('key', 'id') 
    //                     // ->toArray();
    //     $array = [];

    //     foreach ($records as $record) {
    //         $array = Arr::add($array, $record->id, $record->key.' - '.$record->master->key);
    //     }

    //     return $array;
    // }

    // brand array
    private function brands()
    {
        $array = Conf::where('type', 'brand')
                        ->pluck('key', 'id')
                        ->toArray();
        return $array;
    }

    // availability
    private function availability()
    {
        $array = Conf::where('type', 'availability')
                        ->pluck('key', 'id')
                        ->toArray();
        return $array;
    }

    // form
    public function buildForm()
    {
        $category_text = $this->getData('category_text') ? $this->getData('category_text') : null;

        $this
        
        ->add('category_text', 'text', [
            'attr' => ['readonly' => 'readonly'],
            'label' => 'Material Group (use selector)',
            'default_value' => $category_text,
            'rules' => 'required',
        ])

        ->add('category_id', 'hidden', [
            'attr' => ['id' => 'category_id'],
        ])
        ->add('brand_id', 'select', [
            'label' => 'Manufacturer',
            'empty_value' => '=== Select Manufacturer ===',
            'choices' => $this->brands(),
            'rules' => 'required'
        ])
        ->add('part_no', 'text', [
            'label' => 'Part Nr.',
            'rules' => 'required|min:3|max:22'
        ])
        ->add('name', 'text', [
            'label' => 'Name',
            'rules' => 'required|min:3|max:50'
        ])
        ->add('availability_id', 'select', [
            'label' => 'Availability',
            'empty_value' => '=== Select Availability ===',
            'choices' => $this->availability(),
            'rules' => 'required'
        ])
        // ->add('remark', 'text', [
        //     'label' => 'Remark',
        //     'rules' => 'min:2|max:32'
        // ])
        ->add('weight', 'text', [
            'label' => 'Weight',
            'rules' => 'min:3|max:20'
        ])
        ->add('remark', 'textarea', [
            'label' => 'Remark',
            'rules' => 'min:2|max:500'
        ])
        ->add('submit','submit',[
            'label' => 'Next',
            'attr' => ['class' => 'btn btn-success btn-block']
        ]);
    }
}
