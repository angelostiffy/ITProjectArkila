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

$factory->define(App\Trip::class, function (Faker $faker) {
    return [
        'driver_id' => $faker->randomElement(App\Member::pluck('member_id')->toArray()),
        'destination_id' => $faker->randomElement(App\Destination::pluck('destination_id')->toArray()),
        'plate_number' => $faker->randomElement(App\Van::pluck('plate_number')->toArray()),
        'remarks' => $faker->randomElement($array = array ('OB','ER','CC')),
        'status' =>	$faker->randomElement($array = array ('','Departed','On Queue')),
        'total_passengers' => $faker->numberBetween($min = 1, $max = 15),
        'date_departed' => $faker->dateTime($max = 'now', $timezone = null),
        'queue_number' => $faker->unique()->numberBetween($min = 1, $max = 15),
    ];
});
