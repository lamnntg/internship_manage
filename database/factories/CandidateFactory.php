<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Candidate;
use Faker\Generator as Faker;

$factory->define(Candidate::class, function (Faker $faker) {
    return [
        'id' => $faker->uuid,
        'full_name' => $faker->name(),
        'birthday' => $faker->date(),
        'address' => $faker->address(),
        'phone' => $faker->phoneNumber(),
        'email' => $faker->email(),
        'user_name' => $faker->userName(),
        'password' => Hash::make(Str::random(8)),
        'status' =>$faker->numberBetween($min = 1, $max = 3),
    ];
});
