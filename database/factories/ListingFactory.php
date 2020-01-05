<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Listing;
use Faker\Generator as Faker;

$factory->define(Listing::class, function (Faker $faker) {
    return [
        'product' => $faker->word,
        'product_info' => $faker->sentence(3),
        'in_stock' => $faker->numberBetween(20,40),
        'price' => $faker->numberBetween(2000,7000),
        'remark' => $faker->sentence(4)
    ];
});
