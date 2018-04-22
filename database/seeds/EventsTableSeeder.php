<?php

use Illuminate\Database\Seeder;
use Map\Event;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(Map\Event::class, 10)->create();
      
    }
}
