<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Task::class, function (Faker $faker) {
    return [
        'title' => $faker->text(20),
        'description' => $faker->realText(),
        'img_uri' => $faker->imageUrl(),
        'coins' => random_int(10, 100),
        'type' => random_int(1,5),
    ];
});
