<?php

use Faker\Generator as Faker;

$factory->define(App\Click::class, function (Faker $faker) {
    return [
        'provider_id' => factory(App\Provider::class),
        'date' => $faker->dateTimeBetween('-4 years', '-1 years', 'UTC')->format('Y-m-d'),
        'total_clicks' => rand(1000, 5000),
    ];
});
