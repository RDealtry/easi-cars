<?php

use Faker\Generator as Faker;

$factory->define(
    App\Certificate::class, function (Faker $faker) {
        return [
            'house_id'=>random_int(\DB::table('houses')->min('id'), \DB::table('houses')->max('id')),
            'type'=> $faker->randomElement($array = array ('Electric', 'Fire', 'Gas', 'PAT')),
            'cert_no'=> strtoupper($faker->bothify('######')),
            'issued'=> $faker->dateTimeBetween(
                $startDate = '-5 years',
                $endDate = 'now -3 month',
                $timezone = null
            ),
        ];
    }
);
