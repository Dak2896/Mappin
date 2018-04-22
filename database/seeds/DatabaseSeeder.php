<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EventsTableSeeder::class);
        $this->call(ChatsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(MessagesTableSeeder::class);
        $this->call(PhotosTableSeeder::class);
        $this->call(Users_EventsTableSeeder::class);
        $this->call(PointsTableSeeder::class);
      //
      //


      //  $this->call(PointsTableSeeder::class);
    }
}
