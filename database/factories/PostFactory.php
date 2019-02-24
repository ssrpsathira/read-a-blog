<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        '_id' => $faker->sentence(6),
        'title' => $faker->sentence(6),
        'description' => $faker->sentence(200)
    ];
});