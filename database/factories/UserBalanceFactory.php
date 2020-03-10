<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\UserBalance::class, function (Faker $faker) {
    $currentCoins = rand(0, 100);
    return [
        'current_coins' => $currentCoins,
        'max_coins' => rand($currentCoins, $currentCoins * 2),
        'max_points' => rand(0, 100),
        'user_id' => function () {
            return factory(\App\Models\User::class)->create()->id;
        }
    ];
});
