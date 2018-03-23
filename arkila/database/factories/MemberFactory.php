<?php

use Faker\Generator as Faker;

$factory->define(App\Member::class, function (Faker $faker) {
    return [
        'last_name' => $faker->lastName,
        'first_name' => $faker->firstNameMale,
        'middle_name' => $faker->lastName,
        'contact_number' => '906-172-8207',
        'role' => $faker->randomElement(['Operator', 'Driver']),
        'address' => $faker->address,
        'provincial_address' => $faker->address,
        'birth_date' => '09/09/1980',
        'birth_place' => $faker->city,
        'gender' => $faker->randomElement(['Male', 'Female']),
        'citizenship' => $faker->word,
        'civil_status' => 'Single',
        'person_in_case_of_emergency' => $faker->firstNameMale,
        'emergency_address' => $faker->address,
        'emergency_contactno' => '906-172-8207',
        'SSS' => $faker->ssn,
        'license_number' => $faker->ssn,
        'status' => 'Active',
        'expiry_date' => '09/09/1980',
    ];
});
