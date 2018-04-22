<?php

use Faker\Generator as Faker;
use Map\Point;

$factory->define(Map\Point::class, function (Faker $faker) {
    return [
        'lat'=> $faker->latitude,
        'long'=> $faker->longitude,
        'event_id' => Map\Event::all()->random()->id,
    ];
});
