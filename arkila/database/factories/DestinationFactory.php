<?php

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

$factory->define(App\Destination::class, function (Faker $faker) {
    return [
        'description' => $faker->city,
        'amount' => $faker->numberBetween($min = 180, $max = 240),
        'terminal_id' => $faker->randomElement(App\Terminal::pluck('terminal_id')->toArray()),
    ];
});
