<?php

use Faker\Generator as Faker;

$factory->define(App\Member::class, function (Faker $faker) {
    return [
        'opearator_id' => $faker->randomElement(App\Member::pluck('member_id')->toArray()),
        'last_name' => $faker->lastName,
        'first_name' => $faker->firstNameMale,
        'middle_name' => $faker->lastName,
        'contact_number' => $faker->e164PhoneNumber,
        'role' => $faker->randomElement(['Operator', 'Driver']),
        'address' => $faker->address,
        'provincial_address' => $faker->address,
        'birth_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'birth_place' => $faker->city,
        'age' => $faker->randomDigitNotNull,
        'gender' => $faker->randomElement(['Male', 'Female']),
        'citizenship' => $faker->word,
        'civil_status' => $faker->randomElement(['Single', 'Married', 'Divorced', 'Widowed']),
        'number_of_children' => $faker->randomDigitNotNull,
        'spouse' => $faker->firstNameMale,
        'spouse_birthdate' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'father_name' => $faker->firstNameMale,
        'father_occupation' => $faker->jobTitle ,
        'mother_name' => $faker->firstNameFemale,
        'mother_occupation' => $faker->jobTitle,
        'person_in_case_of_emergency' => $faker->firstNameMale,
        'emergency_address' => $faker->address,
        'emergency_contactno' => $faker->e164PhoneNumber,
        'SSS' => $faker->ssn,
        'license_number' => $faker->ssn,
        'status' => $faker->randomElement(['Active', 'Inactive']),
        'expiry_date' => $faker->dateTime($max = 'now', $timezone = null),

    ];
});
