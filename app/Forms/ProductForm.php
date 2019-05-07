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
                        ->where('level', 2)
                        ->orderBy('key')
                        ->get();
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

    // form
    public function buildForm()
    {
        $this
        ->add('category_id', 'select', [
            'label' => '分类',
            'empty_value' => '=== 选择 ===',
            'choices' => $this->categoris(),
            'rules' => 'required',
        ])
        ->add('brand_id', 'select', [
            'label' => '品牌',
            'empty_value' => '=== 选择 ===',
            'choices' => $this->brands(),
            'rules' => 'required'
        ])
        ->add('part_no', 'text', [
            'label' => '货号',
            'rules' => 'required|min:3|max:22'
        ])
        ->add('name', 'text', [
            'label' => '产品名称',
            'rules' => 'required|min:3|max:50'
        ])
        ->add('remark', 'text', [
            'label' => '简介',
            'rules' => 'required|min:3|max:22'
        ])
        ->add('content', 'textarea', [
            'label' => '详情',
            'rules' => 'min:2|max:1000'
        ])
        ->add('submit','submit',[
            'label' => '下一步',
            'attr' => ['class' => 'btn btn-success btn-block']
        ]);
    }
}
