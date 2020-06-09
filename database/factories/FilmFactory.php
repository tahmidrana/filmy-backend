<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Film;
use Faker\Generator as Faker;

$factory->define(Film::class, function (Faker $faker) {
    $movies = ['Shirley', 'No Time to Die', 'Always Bad', 'Bloodshot', 'Avengers Endgame', 'parasite'];
    $photos = ['shirley.jpeg', 'no-time-to-die.jpeg', 'bad.jpeg', 'bloodshot.jpg', 'avengers-endgame.jpeg', 'parasite.jpg'];
    $rand_int = rand(0,5);

    return [
        'name' => $movies[$rand_int],
        'description' => $faker->text($maxNbChars = 400),
        'release_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'rating' => $faker->numberBetween($min = 1, $max = 5),
        'ticket_price' => $faker->numberBetween($min = 50, $max = 1000),
        'country' => $faker->country,
        //'photo' => $faker->image($dir = '/storage', $width = 640, $height = 480)
        //'photo' => $faker->imageUrl($width = 640, $height = 480)
        'photo' => '/uploads/'.$photos[$rand_int]
    ];
});
