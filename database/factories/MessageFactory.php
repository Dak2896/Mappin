<?php

use Faker\Generator as Faker;
use Map\Message;

$factory->define(Map\Message::class, function (Faker $faker) {
    return [
      'user_id'=> Map\User::all()->random()->id,
      'chat_id'=> Map\Chat::all()->random()->id,
      'message_text'=> $faker->text,
    ];
});
