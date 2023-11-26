<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'body' => $faker->realText,
        'image' => 'images/no-image.png',
        'user_id' => User::inRandomOrder()->first()->id,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});