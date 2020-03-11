<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Achievement::class, function (Faker $faker) {
    return [
        'label' => $faker->words(2,true),
        'description' => $faker->realText(),
        'icon_url' => $faker->imageUrl(),
    ];
});
