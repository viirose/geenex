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
            'info' => '{"code":1}',
        ]);

        Conf::create([
            'parent_id' => 1,
            'level' => 1,
            'type' => 'category',
            'key' => 'escalator / travellator',
            'info' => '{"code":2}',
        ]);

            // ------------- level 2 of elevator
            Conf::create([
                'parent_id' => 2,
                'level' => 2,
                'type' => 'category',
                'key' => 'general',
                'info' => '{"code":0}',
            ]);
            Conf::create([
                'parent_id' => 2,
                'level' => 2,
                'type' => 'category',
                'key' => 'machine',
                'info' => '{"code":1}',
            ]);
            Conf::create([
                'parent_id' => 2,
                'level' => 2,
                'type' => 'category',
                'key' => 'control',
                'info' => '{"code":2}',
            ]);
            Conf::create([
                'parent_id' => 2,
                'level' => 2,
                'type' => 'category',
                'key' => 'drive',
                'info' => '{"code":3}',
            ]);
            Conf::create([
                'parent_id' => 2,
                'level' => 2,
                'type' => 'category',
                'key' => 'doors & entrances',
                'info' => '{"code":4}',
            ]);
            Conf::create([
                'parent_id' => 2,
                'level' => 2,
                'type' => 'category',
                'key' => 'shaft / pit',
                'info' => '{"code":5}',
            ]);
            Conf::create([
                'parent_id' => 2,
                'level' => 2,
                'type' => 'category',
                'key' => 'signalisation',
                'info' => '{"code":6}',
            ]);
            Conf::create([
                'parent_id' => 2,
                'level' => 2,
                'type' => 'category',
                'key' => 'car & coubterweight',
                'info' => '{"code":7}',
            ]);
            // ------------- end level 2 : elevator

            // ------------- level 2 : escalator / travellator
            Conf::create([
                'parent_id' => 3,
                'level' => 2,
                'type' => 'category',
                'key' => 'landing',
                'info' => '{"code":1}',
            ]);
            Conf::create([
                'parent_id' => 3,
                'level' => 2,
                'type' => 'category',
                'key' => 'drive station',
                'info' => '{"code":2}',
            ]);
            Conf::create([
                'parent_id' => 3,
                'level' => 2,
                'type' => 'category',
                'key' => 'handrail system',
                'info' => '{"code":3}',
            ]);
            Conf::create([
                'parent_id' => 3,
                'level' => 2,
                'type' => 'category',
                'key' => 'skirting',
                'info' => '{"code":4}',
            ]);
            Conf::create([
                'parent_id' => 3,
                'level' => 2,
                'type' => 'category',
                'key' => 'electrical equipment',
                'info' => '{"code":5}',
            ]);
            Conf::create([
                'parent_id' => 3,
                'level' => 2,
                'type' => 'category',
                'key' => 'mechanical equipment',
                'info' => '{"code":6}',
            ]);
            // --------------- end of level 2

                // --------------- level 3
                Conf::create([
                    'parent_id' => 4,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'service tool',
                    'info' => '{"code":1}',
                ]);
                Conf::create([
                    'parent_id' => 4,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'software',
                    'info' => '{"code":2}',
                ]);

                // ----------
                Conf::create([
                    'parent_id' => 5,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'hoist motor',
                    'info' => '{"code":1}',
                ]);
                Conf::create([
                    'parent_id' => 5,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'gear',
                    'info' => '{"code":2}',
                ]);
                Conf::create([
                    'parent_id' => 5,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'fan, blower',
                    'info' => '{"code":3}',
                ]);
                Conf::create([
                    'parent_id' => 5,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'encoder / techometer',
                    'info' => '{"code":4}',
                ]);
                Conf::create([
                    'parent_id' => 5,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'sheave',
                    'info' => '{"code":5}',
                ]);
                Conf::create([
                    'parent_id' => 5,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'brake',
                    'info' => '{"code":6}',
                ]);

                // ----------
                Conf::create([
                    'parent_id' => 6,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'PCB',
                    'info' => '{"code":1}',
                ]);
                Conf::create([
                    'parent_id' => 6,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'power supply',
                    'info' => '{"code":2}',
                ]);
                Conf::create([
                    'parent_id' => 6,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'circuit breaker, contactor, relay',
                    'info' => '{"code":3}',
                ]);
                Conf::create([
                    'parent_id' => 6,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'tranmsformer',
                    'info' => '{"code":4}',
                ]);

                // ----------
                Conf::create([
                    'parent_id' => 7,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'Assy.',
                    'info' => '{"code":1}',
                ]);
                Conf::create([
                    'parent_id' => 7,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'PCB',
                    'info' => '{"code":2}',
                ]);
                Conf::create([
                    'parent_id' => 7,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'modules',
                    'info' => '{"code":3}',
                ]);
                Conf::create([
                    'parent_id' => 7,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'contactos',
                    'info' => '{"code":4}',
                ]);
                Conf::create([
                    'parent_id' => 7,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'trasformer',
                    'info' => '{"code":5}',
                ]);

                // --------------- level 3
                Conf::create([
                    'parent_id' => 4,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'service tool',
                    'info' => '{"code":1}',
                ]);
                Conf::create([
                    'parent_id' => 4,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'software',
                    'info' => '{"code":2}',
                ]);

                // ----------
                Conf::create([
                    'parent_id' => 8,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'operator',
                    'info' => '{"code":1}',
                ]);
                Conf::create([
                    'parent_id' => 8,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'safety devices',
                    'info' => '{"code":2}',
                ]);
                Conf::create([
                    'parent_id' => 8,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'contacts',
                    'info' => '{"code":3}',
                ]);
                Conf::create([
                    'parent_id' => 8,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'mechanic locks',
                    'info' => '{"code":4}',
                ]);
                Conf::create([
                    'parent_id' => 8,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'track, panels, sill',
                    'info' => '{"code":5}',
                ]);
                Conf::create([
                    'parent_id' => 8,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'emergency opening device',
                    'info' => '{"code":6}',
                ]);

                // ----------
                Conf::create([
                    'parent_id' => 9,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'sheaves, pulleys',
                    'info' => '{"code":1}',
                ]);
                Conf::create([
                    'parent_id' => 9,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'traction media',
                    'info' => '{"code":2}',
                ]);
                Conf::create([
                    'parent_id' => 9,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'governor',
                    'info' => '{"code":3}',
                ]);
                Conf::create([
                    'parent_id' => 9,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'switch, sensors',
                    'info' => '{"code":4}',
                ]);
                Conf::create([
                    'parent_id' => 9,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'travelling cable & accessories',
                    'info' => '{"code":5}',
                ]);

                // ----------
                Conf::create([
                    'parent_id' => 10,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'buttons',
                    'info' => '{"code":1}',
                ]);
                Conf::create([
                    'parent_id' => 10,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'indicators',
                    'info' => '{"code":2}',
                ]);
                Conf::create([
                    'parent_id' => 10,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'switches',
                    'info' => '{"code":3}',
                ]);
                Conf::create([
                    'parent_id' => 10,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'access control device',
                    'info' => '{"code":4}',
                ]);
                Conf::create([
                    'parent_id' => 10,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'acoustic device',
                    'info' => '{"code":5}',
                ]);

                // ----------
                Conf::create([
                    'parent_id' => 11,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'inspection switches',
                    'info' => '{"code":1}',
                ]);
                Conf::create([
                    'parent_id' => 11,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'sheaves, pulleys',
                    'info' => '{"code":2}',
                ]);
                Conf::create([
                    'parent_id' => 11,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'safety gear',
                    'info' => '{"code":3}',
                ]);
                Conf::create([
                    'parent_id' => 11,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'PCB (in car connection box)',
                    'info' => '{"code":4}',
                ]);
                Conf::create([
                    'parent_id' => 11,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'car interior',
                    'info' => '{"code":5}',
                ]);
                Conf::create([
                    'parent_id' => 11,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'car positioning',
                    'info' => '{"code":6}',
                ]);
                Conf::create([
                    'parent_id' => 11,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'load weight',
                    'info' => '{"code":7}',
                ]);
                Conf::create([
                    'parent_id' => 11,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'blower fan (car top)',
                    'info' => '{"code":8}',
                ]);




                // ---------- level 3 new type
                Conf::create([
                    'parent_id' => 12,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'comb',
                    'info' => '{"code":1}',
                ]);
                Conf::create([
                    'parent_id' => 12,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'landing cover',
                    'info' => '{"code":2}',
                ]);

                // ----------
                Conf::create([
                    'parent_id' => 13,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'motor, gearbox',
                    'info' => '{"code":1}',
                ]);
                Conf::create([
                    'parent_id' => 13,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'brake',
                    'info' => '{"code":2}',
                ]);
                Conf::create([
                    'parent_id' => 13,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'drive',
                    'info' => '{"code":3}',
                ]);
                Conf::create([
                    'parent_id' => 13,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'PCB',
                    'info' => '{"code":4}',
                ]);
                Conf::create([
                    'parent_id' => 13,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'circuit breaker, contactor, relay',
                    'info' => '{"code":5}',
                ]);
                Conf::create([
                    'parent_id' => 13,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'track',
                    'info' => '{"code":6}',
                ]);
                Conf::create([
                    'parent_id' => 13,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'return station',
                    'info' => '{"code":7}',
                ]);

                // ----------
                Conf::create([
                    'parent_id' => 14,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'habdrail drive',
                    'info' => '{"code":1}',
                ]);
                Conf::create([
                    'parent_id' => 14,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'handrail inlet',
                    'info' => '{"code":2}',
                ]);
                Conf::create([
                    'parent_id' => 14,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'handrail guide',
                    'info' => '{"code":3}',
                ]);

                // ----------
                Conf::create([
                    'parent_id' => 15,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'skirting',
                    'info' => '{"code":1}',
                ]);
                Conf::create([
                    'parent_id' => 15,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'skirting deflectors',
                    'info' => '{"code":2}',
                ]);
                Conf::create([
                    'parent_id' => 15,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'brushes',
                    'info' => '{"code":3}',
                ]);

                // ----------
                Conf::create([
                    'parent_id' => 16,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'switches & sensors',
                    'info' => '{"code":1}',
                ]);
                Conf::create([
                    'parent_id' => 16,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'lights and indicators',
                    'info' => '{"code":2}',
                ]);

                // ----------
                Conf::create([
                    'parent_id' => 17,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'steps',
                    'info' => '{"code":1}',
                ]);
                Conf::create([
                    'parent_id' => 17,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'demarcation cleats',
                    'info' => '{"code":2}',
                ]);
                Conf::create([
                    'parent_id' => 17,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'rollers',
                    'info' => '{"code":3}',
                ]);
                Conf::create([
                    'parent_id' => 17,
                    'level' => 3,
                    'type' => 'category',
                    'key' => 'chains and links',
                    'info' => '{"code":4}',
                ]);


        // ============================
        // brands
        Conf::create([
            'parent_id' => 1,
            'level' => 1,
            'type' => 'brand',
            'key' => 'Schindler',
            'info' => '{"code":1}',
        ]);
        Conf::create([
            'parent_id' => 1,
            'level' => 1,
            'type' => 'brand',
            'key' => 'OTIS',
            'info' => '{"code":2}',
        ]);
        Conf::create([
            'parent_id' => 1,
            'level' => 1,
            'type' => 'brand',
            'key' => 'KONE',
            'info' => '{"code":3}',
        ]);
        Conf::create([
            'parent_id' => 1,
            'level' => 1,
            'type' => 'brand',
            'key' => 'ThyssenKrupp',
            'info' => '{"code":4}',
        ]);
        Conf::create([
            'parent_id' => 1,
            'level' => 1,
            'type' => 'brand',
            'key' => 'Fermator',
            'info' => '{"code":5}',
        ]);
        Conf::create([
            'parent_id' => 1,
            'level' => 1,
            'type' => 'brand',
            'key' => 'Selcom/Wittur',
            'info' => '{"code":6}',
        ]);
        Conf::create([
            'parent_id' => 1,
            'level' => 1,
            'type' => 'brand',
            'key' => 'STEP',
            'info' => '{"code":7}',
        ]);

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











