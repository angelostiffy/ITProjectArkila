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
$factory->define(App\Announcement::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence($nbWords=4, $variableNbWords = true),
        'description' => $faker->paragraph($nbSentences = 10, $variableNbSentences = true),
        'viewer' => $faker->randomElement(['Public' ,'Driver Only', 'Customer Only', 'Only Me']),
        'created_at' => $faker->dateTime($max = 'now', $timezone = null),
        'updated_at' => $faker->dateTime($max = 'now', $timezone = null)
    ];
});
