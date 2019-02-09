<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description'=>$faker->text,
        'user_id' => function () {
            return App\User::inRandomOrder()->first()->id;
        },

    ];
});
