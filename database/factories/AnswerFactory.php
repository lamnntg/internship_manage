<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Answer;
use Faker\Generator as Faker;

$factory->define(Answer::class, function (Faker $faker) {
    return [
        'id' => $faker->uuid,
        'question_id' => $faker->numberBetween($min = 1, $max = 7),
        'answer' => $faker->realText($maxNbChars = 100),
        'media_url' => $faker->imageUrl(),
        'correct_flag' => $faker->boolean,
    ];
});
