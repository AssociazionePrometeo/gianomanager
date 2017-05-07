<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('secret'),
        'remember_token' => str_random(10),
        'phone_number' => $faker->phoneNumber,
        'expires_at' => new DateTime('next month'),
    ];
});

$factory->define(App\Role::class, function (Faker\Generator $faker) {
    return [
        'id' => $faker->unique()->word,
        'name' => $faker->colorName,
        'protected' => false,
        'permissions' => [],
    ];
});

