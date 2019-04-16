<?php

use Faker\Generator as Faker;

$factory->define(App\ListaManutencao::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'descricao' => $faker->text($maxNbChars = 300),
        'quilometragem' => $faker->numberBetween($min = 1000, $max = 20000),
        'dias' => $faker->numberBetween($min = 60, $max = 365),
    ];
});
