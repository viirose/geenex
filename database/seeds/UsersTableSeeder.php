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
            'password' => bcrypt('000000'),
            'auth' => '{"root":true}',
        ]);

        User::create([
            'name' => 'Patrick.Wu',
            'email' => 'patrick.wu@guntleson.com',
            'auth' => '{"root":true}',
            'email_verified_at' => today(),
            'password' => bcrypt('000000'),
        ]);

        User::create([
            'name' => 'Chris.Ding',
            'email' => 'djj3334@126.com',
            'auth' => '{"root":true}',
            'email_verified_at' => today(),
            'password' => bcrypt('000000'),
        ]);

        User::create([
            'name' => 'Carol.Chen',
            'email' => '1624925120@qq.com',
            'auth' => '{"root":true}',
            'email_verified_at' => today(),
            'password' => bcrypt('000000'),
        ]);
    }
}
