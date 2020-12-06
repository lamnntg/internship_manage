<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'id' => $faker->uuid,
        'question_category_id' => $faker->numberBetween($min = 1, $max = 7),
        'question_degree_id' => $faker->numberBetween($min = 1, $max = 5),
        'question' => $faker->realText($maxNbChars = 100),
        'answer_type' => $faker->numberBetween($min = 1, $max = 3),
        'check_point_flg' => $faker->boolean,
        'interview_flg' => $faker->boolean,
    ];
});
