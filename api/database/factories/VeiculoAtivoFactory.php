<?php

use Faker\Generator as Faker;

$factory->define(App\VeiculoAtivo::class, function (Faker $faker) {
    return [
        'quilometragem' => $faker->numberBetween($min = 1000, $max = 20000),
        'dias' => $faker->numberBetween($min = 60, $max = 365),
    ];
});
