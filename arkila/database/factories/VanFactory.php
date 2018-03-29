<?php

use Faker\Generator as Faker;
use \App\VanModel;
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

    $vanModel = VanModel::create([
        'description' => 'Innova'
    ]);

    return [
        'plate_number' => $faker->unique()->bothify('??? - ###'),
        'model_id' =>  $vanModel,
        'seating_capacity'=> $faker->numberBetween($min = 13, $max = 15),
        'status' => 'Active'
    ];
});