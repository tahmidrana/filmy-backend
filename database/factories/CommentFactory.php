<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comment;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'comment_body'=> $faker->text($maxNbChars = 200),
        'user_id'=> User::all()->random()->id
    ];
});
