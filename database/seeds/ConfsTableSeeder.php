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
            'key' => '机柜',
            'info' => '{"code":1}',
        ]);

        Conf::create([
            'parent_id' => 1,
            'level' => 1,
            'type' => 'category',
            'key' => '综合布线',
            'info' => '{"code":2}',
        ]);

            // ------------- level 2 of elevator
            Conf::create([
                'parent_id' => 2,
                'level' => 2,
                'type' => 'category',
                'key' => '冷通道',
                'info' => '{"code":0}',
            ]);
            Conf::create([
                'parent_id' => 2,
                'level' => 2,
                'type' => 'category',
                'key' => '标准机柜',
                'info' => '{"code":1}',
            ]);
            Conf::create([
                'parent_id' => 2,
                'level' => 2,
                'type' => 'category',
                'key' => '附件',
                'info' => '{"code":2}',
            ]);

            Conf::create([
                'parent_id' => 3,
                'level' => 2,
                'type' => 'category',
                'key' => '线材',
                'info' => '{"code":3}',
            ]);

            Conf::create([
                'parent_id' => 3,
                'level' => 2,
                'type' => 'category',
                'key' => '面板',
                'info' => '{"code":4}',
            ]);

            Conf::create([
                'parent_id' => 3,
                'level' => 2,
                'type' => 'category',
                'key' => '附件',
                'info' => '{"code":5}',
            ]);

            // ------------- end level 2 : elevator


        // brands
        Conf::create([
            'parent_id' => 1,
            'level' => 1,
            'type' => 'brand',
            'key' => 'Guntleson-匠森',
            'info' => '{"code":1}',
        ]);
        Conf::create([
            'parent_id' => 1,
            'level' => 1,
            'type' => 'brand',
            'key' => 'TopTower-晶塔',
            'info' => '{"code":2}',
        ]);
 


    }
}











