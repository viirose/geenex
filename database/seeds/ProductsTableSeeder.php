<?php

use Illuminate\Database\Seeder;

use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds. 
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'part_no' => 'first',
            'type_id' => 14,
            'info' => '{"part":14}',
        ]);
        Product::create([
            'part_no' => 'second',
            'type_id' => 14,
            'info' => '{"part":14, "ok":false}',
        ]);
        Product::create([
            'part_no' => 'forth',
            'type_id' => 25,
            'info' => '{"part":25}',
        ]);
    }
}
