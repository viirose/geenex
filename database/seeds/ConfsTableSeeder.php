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
                'key' => '服务器机柜',
                'info' => '{"code":1}',
            ]);
            Conf::create([
                'parent_id' => 2,
                'level' => 2,
                'type' => 'category',
                'key' => '网络机柜',
                'info' => '{"code":2}',
            ]);
            Conf::create([
                'parent_id' => 2,
                'level' => 2,
                'type' => 'category',
                'key' => '墙柜',
                'info' => '{"code":3}',
            ]);
            Conf::create([
                'parent_id' => 2,
                'level' => 2,
                'type' => 'category',
                'key' => 'PDU',
                'info' => '{"code":4}',
            ]);

            Conf::create([
                'parent_id' => 3,
                'level' => 2,
                'type' => 'category',
                'key' => '光纤系统',
                'info' => '{"code":0}',
            ]);

            Conf::create([
                'parent_id' => 3,
                'level' => 2,
                'type' => 'category',
                'key' => '配件',
                'info' => '{"code":1}',
            ]);

            Conf::create([
                'parent_id' => 3,
                'level' => 2,
                'type' => 'category',
                'key' => '屏蔽线材',
                'info' => '{"code":2}',
            ]);

            Conf::create([
                'parent_id' => 3,
                'level' => 2,
                'type' => 'category',
                'key' => '非屏蔽线材',
                'info' => '{"code":3}',
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











