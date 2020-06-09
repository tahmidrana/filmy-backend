<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Film;
use Faker\Generator as Faker;

$factory->define(Film::class, function (Faker $faker) {
    $movies = ['Shirley', 'No Time to Die', 'Top Gun: Maverick', 'Inception'];

    return [
        'name' => $faker->name,
        'description' => $faker->text($maxNbChars = 400),
        'release_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'rating' => $faker->numberBetween($min = 1, $max = 5),
        'ticket_price' => $faker->numberBetween($min = 50, $max = 1000),
        'country' => $faker->country,
        //'photo' => $faker->image($dir = '/storage', $width = 640, $height = 480)
        'photo' => $faker->imageUrl($width = 640, $height = 480)
    ];
});
