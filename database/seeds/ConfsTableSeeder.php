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
            'key' => 'Rotational molding',
            'info' => '{"code":1}',
        ]);

        Conf::create([
            'parent_id' => 1,
            'level' => 1,
            'type' => 'category',
            'key' => 'Others',
            'info' => '{"code":2}',
        ]);

            // ------------- level 2 of elevator
            Conf::create([
                'parent_id' => 2,
                'level' => 2,
                'type' => 'category',
                'key' => 'boxes',
                'info' => '{"code":0}',
            ]);
            Conf::create([
                'parent_id' => 2,
                'level' => 2,
                'type' => 'category',
                'key' => 'pots',
                'info' => '{"code":1}',
            ]);
            Conf::create([
                'parent_id' => 2,
                'level' => 2,
                'type' => 'category',
                'key' => 'models',
                'info' => '{"code":2}',
            ]);
            // --------------- end of level 2

                // --------------- level 3
                Conf::create([
                    'parent_id' => 4,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'incubator',
                    'info' => '{"code":1}',
                ]);
                Conf::create([
                    'parent_id' => 5,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'flowerpots',
                    'info' => '{"code":2}',
                ]);
                Conf::create([
                    'parent_id' => 6,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'LED animal models',
                    'info' => '{"code":3}',
                ]);

        // ============================
        // brands
        Conf::create([
            'parent_id' => 1,
            'level' => 1,
            'type' => 'brand',
            'key' => 'Life',
            'info' => '{"code":1}',
        ]);
        Conf::create([
            'parent_id' => 1,
            'level' => 1,
            'type' => 'brand',
            'key' => 'Gardening',
            'info' => '{"code":2}',
        ]);
        Conf::create([
            'parent_id' => 1,
            'level' => 1,
            'type' => 'brand',
            'key' => 'Public Utilities',
            'info' => '{"code":3}',
        ]);
        // end brands
        
        // availability
        Conf::create([
            'parent_id' => 1,
            'level' => 1,
            'type' => 'availability',
            'key' => 'normal',
        ]);
        Conf::create([
            'parent_id' => 1,
            'level' => 1,
            'type' => 'availability',
            'key' => 'low',
        ]);
        Conf::create([
            'parent_id' => 1,
            'level' => 1,
            'type' => 'availability',
            'key' => 'none',
        ]);


    }
}











