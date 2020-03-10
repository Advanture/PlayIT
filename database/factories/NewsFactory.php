<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\News::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'description' => $faker->realText(),
        'creator_id' => 1,
    ];
});
