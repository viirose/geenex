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
            'parent_id' => 0,
            'level' => 0,
            'type' => 'root',
            'key' => 'root',
            'text' => 'root',
            'val' => 'root',
            'info' => null,
        ]);

        Conf::create([
            'parent_id' => 1,
            'level' => 1,
            'type' => 'category',
            'key' => 'elevator',
        ]);

        Conf::create([
            'parent_id' => 2,
            'level' => 2,
            'type' => 'category',
            'key' => 'machine',
        ]);

        Conf::create([
            'parent_id' => 2,
            'level' => 2,
            'type' => 'category',
            'key' => 'controller',
        ]);
        Conf::create([
            'parent_id' => 2,
            'level' => 2,
            'type' => 'category',
            'key' => 'shaft/pit',
        ]);
        Conf::create([
            'parent_id' => 2,
            'level' => 2,
            'type' => 'category',
            'key' => 'car',
        ]);
        Conf::create([
            'parent_id' => 2,
            'level' => 2,
            'type' => 'category',
            'key' => 'loading',
        ]);
            // machine
            Conf::create([
                'parent_id' => 3,
                'level' => 3,
                'type' => 'category',
                'key' => 'motor',
            ]);
            Conf::create([
                'parent_id' => 3,
                'level' => 3,
                'type' => 'category',
                'key' => 'ventilator, blower',
            ]);
            Conf::create([
                'parent_id' => 3,
                'level' => 3,
                'type' => 'category',
                'key' => 'encoder',
            ]);
            Conf::create([
                'parent_id' => 3,
                'level' => 3,
                'type' => 'category',
                'key' => 'brake',
            ]);

            // controller
            Conf::create([
                'parent_id' => 4,
                'level' => 3,
                'type' => 'category',
                'key' => 'drive',
            ]);
            Conf::create([
                'parent_id' => 4,
                'level' => 3,
                'type' => 'category',
                'key' => 'ventilator, blower',
            ]);
            Conf::create([
                'parent_id' => 4,
                'level' => 3,
                'type' => 'category',
                'key' => 'PCB',
            ]);
            Conf::create([
                'parent_id' => 4,
                'level' => 3,
                'type' => 'category',
                'key' => 'contactor, relay',
            ]);
            Conf::create([
                'parent_id' => 4,
                'level' => 3,
                'type' => 'category',
                'key' => 'tranmsformer',
            ]);

            // shaft/pit
            Conf::create([
                'parent_id' => 5,
                'level' => 3,
                'type' => 'category',
                'key' => 'guide shoe, roller',
            ]);
            Conf::create([
                'parent_id' => 5,
                'level' => 3,
                'type' => 'category',
                'key' => 'governor',
            ]);
            Conf::create([
                'parent_id' => 5,
                'level' => 3,
                'type' => 'category',
                'key' => 'traction media',
            ]);
            Conf::create([
                'parent_id' => 5,
                'level' => 3,
                'type' => 'category',
                'key' => 'pit equipment',
            ]);
            Conf::create([
                'parent_id' => 5,
                'level' => 3,
                'type' => 'category',
                'key' => 'switch, sensor',
            ]);

            // car
            Conf::create([
                'parent_id' => 6,
                'level' => 3,
                'type' => 'category',
                'key' => 'door operator',
            ]);
            Conf::create([
                'parent_id' => 6,
                'level' => 3,
                'type' => 'category',
                'key' => 'door equipment',
            ]);
            Conf::create([
                'parent_id' => 6,
                'level' => 3,
                'type' => 'category',
                'key' => 'detector',
            ]);
            Conf::create([
                'parent_id' => 6,
                'level' => 3,
                'type' => 'category',
                'key' => 'car top',
            ]);
            Conf::create([
                'parent_id' => 6,
                'level' => 3,
                'type' => 'category',
                'key' => 'car faxture',
            ]);
            Conf::create([
                'parent_id' => 6,
                'level' => 3,
                'type' => 'category',
                'key' => 'load weighting',
            ]);

            // car
            Conf::create([
                'parent_id' => 7,
                'level' => 3,
                'type' => 'category',
                'key' => 'landing faxture',
            ]);
            Conf::create([
                'parent_id' => 7,
                'level' => 3,
                'type' => 'category',
                'key' => 'landing door',
            ]);
        Conf::create([
            'parent_id' => 1,
            'level' => 1,
            'type' => 'category',
            'key' => 'ESCALATOR/AUTOWALK',
        ]);

        // brands
        Conf::create([
            'parent_id' => 1,
            'level' => 1,
            'type' => 'brand',
            'key' => 'Schindler',
        ]);
        Conf::create([
            'parent_id' => 1,
            'level' => 1,
            'type' => 'brand',
            'key' => 'OTIS',
        ]);
        Conf::create([
            'parent_id' => 1,
            'level' => 1,
            'type' => 'brand',
            'key' => 'KONE',
        ]);
        Conf::create([
            'parent_id' => 1,
            'level' => 1,
            'type' => 'brand',
            'key' => 'ThyssenKrupp',
        ]);
        Conf::create([
            'parent_id' => 1,
            'level' => 1,
            'type' => 'brand',
            'key' => 'Fermator',
        ]);
        Conf::create([
            'parent_id' => 1,
            'level' => 1,
            'type' => 'brand',
            'key' => 'Selcom/Wittur',
        ]);
        Conf::create([
            'parent_id' => 1,
            'level' => 1,
            'type' => 'brand',
            'key' => 'other',
        ]);


    }
}











