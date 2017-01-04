<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'root',
            'email' => 'root@site.com',
            'password' => bcrypt('RootPassword1'),
            'isAdmin' => '1',
        ]);
        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@site.com',
            'password' => bcrypt('password1'),
            'isAdmin' => '0',
        ]);
    }
}
