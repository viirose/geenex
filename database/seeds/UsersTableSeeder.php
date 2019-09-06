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
            'name' => 'Louis',
            'email' => '457646290@qq.com',
            'email_verified_at' => today(),
            'contact_verified_at' => today(),
            'password' => bcrypt('123456'),
            'auth' => '{"root":true}',
        ]);

    }
}
