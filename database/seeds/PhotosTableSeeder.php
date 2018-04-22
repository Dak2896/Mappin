<?php

use Illuminate\Database\Seeder;
use Map\Photo;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          factory(Map\Photo::class, 10)->create();
    }
}
