<?php

use Faker\Generator as Faker;
use Faker\Provider;
use Map\User;

$factory->define(Map\Photo::class, function (Faker $faker) {
    return [
        'image_path'=> $faker->fileExtension,
        'user_id'=>  Map\User::all()->random()->id,
        'event_id'=>  Map\Event::all()->random()->id,
    ];
});
