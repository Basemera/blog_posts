<?php

use Faker\Generator as Faker;

$factory->define(App\posts::class, function (Faker $faker) {
    return [
        // 'id'=> $faker->increments(),
        'title'=> $faker->text(40),
        'content'=> $faker->text(),
        'posted_on'=> $faker->dateTime()
    ];
});
