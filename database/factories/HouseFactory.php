<?php

use Faker\Generator as Faker;

$factory->define(
    App\House::class, function (Faker $faker) {
        return [
            'address'=> $faker->unique()->streetAddress.', York',
            //'postcode'=> $faker->postcode, // =>strtoupper($faker->bothify('YO?? ?##')), //postcode YO99
            'postcode'=>strtoupper($faker->bothify('YO## #??')), //postcode YO99 9AA
            'live_date'=> $faker->dateTimeBetween(
                $startDate = '-5 years',
                $endDate = 'now -30 days',
                $timezone = null
            ),
            'no_rooms'=> $faker->randomDigitNotNull,
            'gender'=> $faker->randomElement($array = array ('Female', 'Male')),
            'landlord'=> $faker->randomElement($array = array ('Green Pastures', 'Private', 'Other')),
            'dead_date'=>null,
        ];
    }
);
