<?php


use App\Models\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'vk_id' => $faker->numerify('########'),
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'avatar_url' => $faker->imageUrl(),
        'app_token' => strtoupper(Str::random(8)),
    ];
});
