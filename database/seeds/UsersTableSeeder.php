<?php

use Illuminate\Database\Seeder;

use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Kris',
            'email' => 'kris@viirose.com',
            'email_verified_at' => today(),
            'contact_verified_at' => today(),
            'password' => bcrypt('000000'),
            'auth' => '{"root":true}',
        ]);

        User::create([
            'name' => 'Philip Wong',
            'email' => 'philip.wong@joclift.com',
            'email_verified_at' => today(),
            'contact_verified_at' => today(),
            'password' => bcrypt('91320621MAX120XX1'),
            'auth' => '{"root":true}',
        ]);

    }
}
