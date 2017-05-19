<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Student::class, function(Faker\Generator $faker) {

    return [
        'firstname'         => $faker->firstName,
        'lastname'          => $faker->lastName,
        'email'             => $faker->unique()->email,
        'schoolboard_id'    => ($faker->randomKey([ 1, 2]) + 1),
        'created_at'        => \Carbon\Carbon::now(),
        'updated_at'        => \Carbon\Carbon::now()
    ];
});


$factory->define(App\Grade::class, function (Faker\Generator $faker) {

    return [
        'grade'        => ($faker->randomKey(range(1,10)) + 1),
        'student_id'   => ($faker->randomKey(range(1,50)) + 1),
        'created_at'   => \Carbon\Carbon::now(),
        'updated_at'   => \Carbon\Carbon::now()
    ];
});

