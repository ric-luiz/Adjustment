<?php

use Faker\Generator as Faker;

$factory->define(App\Veiculo::class, function (Faker $faker) {
    return [
        'nome' => $faker->name($gender = 'male'),
        'marca' => $faker->word,
        'cilindrada' => $faker->randomNumber($nbDigits = 3, $strict = false),
        'descricao' => $faker->text($maxNbChars = 300),
    ];
});
