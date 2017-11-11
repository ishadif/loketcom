<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Event::class, function (Faker $faker) {
    $title = $faker->sentence;

    return [
    	'user_id' => function() {
    		return factory('App\User')->create()->id;
    	},
        'venue_id' => function(){
        	return factory('App\Venue')->create()->id;
        },
        'title' => $title,
        'slug' => str_slug($title,'-'),
        'event_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'description' => $faker->paragraph,
    ];
});
