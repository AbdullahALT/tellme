<?php

use Illuminate\Database\Seeder;

class MessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $message = new \App\Message();
        $message->content = 'This is a test message, hope it works';
        $message->user_id = 1;
        $message->save();
    }
}
