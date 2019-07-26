<?php

use App\User;
use App\personaEncuestaRes;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'nombre' => $faker->firstName($gender = 'male'|'female'),
        'apaterno' => $faker->lastName,
        'amaterno' => $faker->lastName,
        'edad' => $faker->numberBetween($min = 18, $max = 40),
        'sexo' => $faker->randomElement($array = array ('Masculino','Femenino')),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'cargo' => $faker->jobTitle,
        'jornada' => $faker->randomElement($array = array ('Diurna','Nocturna','Mixta')),
        'escolaridad' => $faker->randomElement($array = array ('Primaria','Secundaria','Preparatoria','Tecnica','Universidad')),
        'departamento_id' => $faker->randomElement($array = array (1,2,3,4,5)),
        'password' => '$2y$10$bI44DSNtzqAsHMHkElLC0O4LLuFJj4RWFp3YyBF1r9jN4B52FJVXK', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(personaEncuestaRes::class, function (Faker $faker) {
    return [
        'p' => $faker->randomElement($array = array (1,2,3,4,5,6))
    ];
});
