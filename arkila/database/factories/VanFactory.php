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

$factory->define(App\Van::class, function (Faker $faker) {
    return [
        'plate_number' => $faker->unique()->bothify('??? - ####'),
        'model' => $faker->word,
        'seating_capacity'=> $faker->numberBetween($min = 13, $max = 15),
    ];
});