<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Product::class, function (Faker $faker) {
    return [
        'price' => rand(1, 1200),
        'name' => $faker->name,
        'in_stock' => rand(1, 200),
        'img_url' => $faker->imageUrl()
    ];
});
