<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(\App\Models\Promocode::class, function (Faker $faker) {
    return [
        'task_id' => function () {
            return factory(\App\Models\Task::class)->create()->id;
        },
        'value' => Str::random(5) . '-'
            . Str::random(5) . '-'
            . Str::random(5),
        'usage_count' => 10,
        'creator_id' => function () {
            return factory(\App\Models\User::class)->create()->id;
        }
    ];
});
