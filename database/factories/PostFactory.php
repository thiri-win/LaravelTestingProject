<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Enums\PostType;
use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->pluck('id')->random(),
        'title' => $faker->sentence,
        'content' => $faker->paragraph,
        'status' => PostType::getRandomValue(),        
    ];
});
