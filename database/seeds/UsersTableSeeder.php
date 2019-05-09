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
            'name' => 'Bella',
            'email' => 'bella@viirose.com',
            'email_verified_at' => today(),
            'contact_verified_at' => today(),
            'password' => bcrypt('000000'),
            'auth' => '{"admin":true}',
        ]);

        User::create([
            'name' => 'Jiang',
            'email' => 'j@test.com',
            'email_verified_at' => today(),
            'contact_verified_at' => today(),
            'password' => bcrypt('000000'),
            'auth' => '{"root":true}',
        ]);

        User::create([
            'name' => 'Wang',
            'email' => 'w@test.com',
            'email_verified_at' => today(),
            'contact_verified_at' => today(),
            'password' => bcrypt('000000'),
            'auth' => '{"root":true}',
        ]);
    }
}
