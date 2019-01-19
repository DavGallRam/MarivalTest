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
            'name'=>'David',
            'email'=>'david@marivaltest.com',
            'password'=>bcrypt('123456'),
        ]);
    }
}

