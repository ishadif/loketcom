<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Venue::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'address' => $faker->address
    ];
});