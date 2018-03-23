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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => 'admin',
        'username' => 'admin',
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$H5F/aSgaf54YcyWGP9GzH.otOGu6QNVS0AHwFuy6m2o0DA71KHcye',
        'user_type' => 'Super-Admin',
        'status' => 'enable',
        'terminal_id' => 1
    ];
});
