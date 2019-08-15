<?php

use Faker\Generator as Faker;

$factory->define(\App\Post::class, function (Faker $faker) {
    return [
        'title'=>$faker->title,
        'body'=>$faker->url,
        'user_id'=>$faker->randomDigitNotNull,
    ];
});
