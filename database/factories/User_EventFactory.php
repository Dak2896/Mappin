<?php

use Faker\Generator as Faker;

$factory->define(Map\User_Event::class, function (Faker $faker) {
    return [
      'user_id'=> Map\User::all()->random()->id,
      'event_id'=> Map\Event::all()->random()->id,
      'number_vote'=> $faker->randomDigit,
      'text_vote'=> $faker->text,
    ];
});
