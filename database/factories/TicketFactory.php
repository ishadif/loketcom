<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Ticket::class, function (Faker $faker) {
    return [
        'event_id' => function () {
        	return factory('App\Event')->create()->id;
        },
        'name' => $faker->word,
        'price' => $faker->randomDigit,
        'quantity' => $faker->randomDigit,
    ];
});
