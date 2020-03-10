<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Rank::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'required_coins' => rand(10, 999)
    ];
});
