<?php

use Faker\Generator as Faker;

$factory->define(Map\Chat::class, function (Faker $faker) {
    return [
      'event_id'=> Map\Event::all()->random()->id,
    ];
});
