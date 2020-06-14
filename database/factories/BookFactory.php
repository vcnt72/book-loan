<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'writer' => $faker->name,
        'publisher' => $faker->name,
        'isbn' => Str::random(10),
        'content' => Str::random(30),
        'user_id' => 1
    ];
});
