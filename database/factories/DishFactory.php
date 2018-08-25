<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Dish::class, function (Faker $faker) {
    return [
        
        'dishtype_id' => $faker->numberBetween($min=1,$max=5),
        'canteen_id' => $faker->numberBetween($min=1,$max=3),
        'price' => $faker->randomFloat($nbMaxDecimals=2,$min=1,$max=10),
        'pic' => $faker->imageUrl($width = 400, $height=400, 'food', true),
        'remark'=>$faker->sentence($nbWords = 6, $variableNbWords = true)
    ];
});
