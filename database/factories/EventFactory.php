<?php

use Faker\Generator as Faker;

$factory->define(Map\Event::class, function (Faker $faker) {
    return [
      'category'=> $faker->word,
      'point_id'=> $faker->randomDigit,
      'start_date' => $faker->datetime,
      'end_date' =>  $faker->datetime,
    ];
});
