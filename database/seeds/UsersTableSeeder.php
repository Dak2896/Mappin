<?php

use Illuminate\Database\Seeder;
use Map\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Map\User::class, 10)->create();/*->each(function($u) {
         /*$u->photos()->save(factory(Map\Photo::class)->make());
         $u->messages()->save(factory(Map\Message::class)->make());
   });*/
    }
}
