<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Survey::class, function (Faker $faker) {
    return [
        'title' => $faker->text(50),
        'description' => $faker->text(100),
        'survey_question_id' => $faker->numberBetween($min = 1, $max = 20),
    ];
});
