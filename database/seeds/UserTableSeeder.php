<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'user';
        DB::table($table)->insert([
            'username' => 'admin',
            'password' => bcrypt('123'),
            'email' => 'admin@gmail.com',
            'firstname' => 'first',
            'lastname' => 'last',
            'address' => '3 Avenue Albert Einstein 69100',
            'level' => 1
        ]);
        DB::table($table)->insert([
            'username' => 'user1',
            'password' => bcrypt('123'),
            'email' => 'user1@gmail.com',
            'firstname' => '1',
            'lastname' => '1.1',
            'address' => '3 Avenue Albert Einstein 69100',
            'level' => 0
        ]);
        DB::table($table)->insert([
            'username' => 'user2',
            'password' => bcrypt('123'),
            'email' => 'user2@gmail.com',
            'firstname' => '2',
            'lastname' => '2.1',
            'address' => '3 Avenue Albert Einstein 69100',
            'level' => 0
        ]);
    }
}
