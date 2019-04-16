<?php

use Faker\Generator as Faker;

$factory->define(App\AjusteManutencao::class, function (Faker $faker) {
    return [
        'revisado' => boolean,
    ];
});
