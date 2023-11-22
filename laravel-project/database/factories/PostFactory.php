<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'body' => $faker->realText,
        'image' => 'images/no-image.png',
        'created_at' => now(),
        'updated_at' => now(),
    ];
});