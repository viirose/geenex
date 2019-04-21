<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;
use Illuminate\Support\Arr;

use App\Conf;

class ProductForm extends Form
{
    // category array
    private function categoris()
    {
        $records = Conf::where('type', 'category')
                        ->where('level', 3)
                        ->orderBy('key')
                        ->get();
                        // ->pluck('key', 'id') 
                        // ->toArray();
        $array = [];

        foreach ($records as $record) {
            $array = Arr::add($array, $record->id, $record->key.' - '.$record->master->key);
        }

        return $array;
    }

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
        $this
        ->add('category_id', 'select', [
            'label' => 'Category',
            'empty_value' => '=== Select Category ===',
            'choices' => $this->categoris(),
            'rules' => 'required',
        ])
        ->add('brand_id', 'select', [
            'empty_value' => '=== Select Brand ===',
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
            'empty_value' => '=== Select availability ===',
            'choices' => $this->availability(),
            'rules' => 'required'
        ])
        ->add('remark', 'text', [
            'label' => 'Remark',
            'rules' => 'min:2|max:32'
        ])
        ->add('content', 'textarea', [
            'label' => 'Content',
            'rules' => 'min:2|max:200'
        ])
        ->add('submit','submit',[
            'label' => 'Next',
            'attr' => ['class' => 'btn btn-success btn-block']
        ]);
    }
}
