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
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt("password"),
        'pic' => "nouser.png",
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\People::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => str_random(11),
        'password' => bcrypt("password"),
    ];
});

$factory->define(App\Capital::class, function (Faker $faker) {
    return [
        'amount' => 200000.00,
        'people_id' => 3
    ];
});

$factory->define(App\Expense::class, function (Faker $faker) {
    return [
        'item' => "Transport",
        'amount' => 200000.00,
        'people_id' => 3
    ];
});

$factory->define(App\Notes::class, function (Faker $faker) {
    return [
        'note' => str_random(200),
        'people_id' => 3
    ];
});

$factory->define(App\Sales::class, function (Faker $faker) {
    return [
        'item' => "item 1",
        'amount' => 2000.00,
        'people_id' => 3
    ];
});