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

$factory->define(App\Card::class, function (Faker\Generator $faker) {
    return [
        'id' => $faker->uuid,
        'active' => $faker->boolean(),
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        }
    ];
});

$factory->define(App\Resource::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
    ];
});

$factory->define(App\Reservation::class, function (Faker\Generator $faker) {
    $startDate = new DateTime('tomorrow 2pm');

    return [
        'starts_at' => $startDate,
        'ends_at' => $startDate->modify('+2 hours'),
        'user_id' => function () {
            return factory(App\User::class)->create();
        },
        'resource_id' => function () {
            return factory(App\Resource::class)->create();
        }
    ];
});
