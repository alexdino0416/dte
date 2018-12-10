<?php

use Faker\Generator as Faker;

$factory->define(App\People::Class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'lastname' => $faker->lastName,
        'age' => rand(18,65),
        'gender' => $faker->randomElement(['male', 'female']),
        'email' => $faker->unique()->safeEmail,
        'calification' => rand(1,5),
        'job_id' => rand(1,63),
        'city_id' => rand(1,31),
        'opinion' => $faker->sentence(4)
    ];
});

