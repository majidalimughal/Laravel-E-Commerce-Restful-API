<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name'=>$faker->word,
        'detail'=>$faker->paragraph,
        'price'=>$faker->numberBetween(0,1000),
        'stock'=>$faker->numberBetween(0,100),
        'discount'=>$faker->numberBetween(2,20)

    ];
});
