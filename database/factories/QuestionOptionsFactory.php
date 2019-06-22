<?php

use Faker\Generator as Faker;

$factory->define(\App\Model\QuestionOption::class, function (Faker $faker) {
    return [
        //
        'option' => $faker->sentence(1),


    ];
});
