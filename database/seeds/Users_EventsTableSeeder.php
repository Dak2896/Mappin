<?php

use Illuminate\Database\Seeder;
use Map\User_Event;
class Users_EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Map\User_Event::class, 10)->create();
    }
}
