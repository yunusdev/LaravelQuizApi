<?php

use Faker\Generator as Faker;

$factory->define(\App\Model\Topic::class, function (Faker $faker) {

    $title = $faker->sentence(2);

    return [
        //
        'title' => $title,
        'slug' => str_slug($title),
    ];
});
