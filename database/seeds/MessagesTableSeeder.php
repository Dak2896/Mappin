<?php

use Illuminate\Database\Seeder;
use Map\Message;
class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(Map\Message::class, 10)->create();
    }
}
