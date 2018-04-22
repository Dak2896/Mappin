<?php

use Illuminate\Database\Seeder;
use Map\Point;

class PointsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Map\Point::class, 10)->create();
    }
}
