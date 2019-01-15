<?php

use Faker\Generator as Faker;

$factory->define(\App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence(10),
        'long_description' => $faker->realText(),
        'price' => $faker->randomFloat(2,5,150)
    ];
});
