<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'to' => ($to = $faker->date('Y-m-d')),
        'from' => $faker->date('Y-m-d', $to),
    ];
});
