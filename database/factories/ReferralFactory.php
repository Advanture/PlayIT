<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Referral::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(\App\Models\User::class)->create()->id;
        },
        'referral_id' => function () {
            return factory(\App\Models\User::class)->create()->id;
        }
    ];
});
