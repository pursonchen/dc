<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Models\User::class, function (Faker $faker) {
    static $password;
    $now = Carbon::now()->toDateTimeString();

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('password'),
        'remember_token' => str_random(10),
        'introduction' => $faker->sentence(),
        'gender' => $faker->numberBetween($min=0,$max=1),
        'status' => $faker->numberBetween($min=0,$max=1),
        'department_id' => $faker->numberBetween($min=1,$max=3),
        'title' => $faker->jobTitle,
        'mobile' => $faker->phoneNumber,
        'created_at' => $now,
        'updated_at' => $now,
    ];
});