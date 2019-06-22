<?php

use App\Model\Topic;
use Faker\Generator as Faker;

$factory->define(\App\Model\Question::class, function (Faker $faker) {
    return [
        //

        'title' => $faker->sentence(2),
        'answer_explanation' => $faker->paragraph(3),


    ];
});
