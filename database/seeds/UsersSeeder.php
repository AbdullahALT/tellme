<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user->name = 'Abdullah ALT';
        $user->email = 'abdulla20103@gmail.com';
        $user->password = 'notnull';
        $user->save();
    }
}
