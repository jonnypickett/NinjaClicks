<?php

use Faker\Generator as Faker;

$factory->define(App\Provider::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->word,
        'display_name' => $faker->company,
        'hex_color' => $faker->hexcolor,
    ];
});
