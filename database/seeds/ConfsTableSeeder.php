<?php

use Illuminate\Database\Seeder;

use App\Conf;

class ConfsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Conf::create([
            'parent_id' => 1,
            'key' => 'root',
            'text' => 'root',
            'val' => 'root',
            'info' => null,
        ]);
    }
}
