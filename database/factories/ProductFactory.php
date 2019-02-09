<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(4),
        'price'=>$faker->randomNumber(2),
        'old_price'=> $faker->randomNumber(2),
        'description'=> $faker->sentence(9),
        'count'=>$faker->randomDigit(0),
        'vendor_code'=>$faker->randomNumber(4),
        'status'=>rand(0,1),
        'rating'=>rand(0,5),
        'is_featured'=>rand(0,1),
        'is_new'=>rand(0,1),
        'discount'=>rand(0,1),
        'image'=>null,
        'views'=>$faker->randomNumber(4),
        'user_id' => function () {
            return App\User::inRandomOrder()->first()->id;
        },
    ];
});
