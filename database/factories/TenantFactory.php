<?php

use Faker\Generator as Faker;

$factory->define(
    App\Tenant::class, function (Faker $faker) {

        $gender = $faker->randomElements(['female', 'male'])[0];
        $prefer = $faker->firstname($gender);

        return [
            //'id'=>null,
            'preferred_name'=> $prefer,
            'official_name'=> $prefer." ".$faker->lastname,
            'dob'=> $faker->dateTimeBetween(
                $startDate = '-50 years',
                $endDate = '-18 years',
                $timezone = null
            ),
            'gender'=>$gender,
            //'gender'=>'Male',
            'charity_in_date'=> $faker->dateTimeBetween(
                $startDate = '-5 years',
                $endDate = '-1 years',
                $timezone = null
            ),
            'charity_out_date'=>null,
            'email'=> $faker->safeEmail,
            'phone'=>strtoupper($faker->bothify('07### ######')), //phone 07999 999999
            //'photo'=> null,
            'ni_no'=> strtoupper($faker->bothify('?? ## ## ## ?')), //ni AA 99 99 99 A
            'hb_ref'=> strtoupper($faker->bothify('## ## ##')), //hb 99 99 99
            'referred_from'=> $faker->randomElement($array = array('Council hostel', 'Church', 'Prison', 'Other')),
            'exit_to'=> $faker->randomElement($array = array ('Council flat', 'Private rented', 'Hostel', 'Evicted', 'Other')),
            'resettlement'=> $faker->randomElement($array = array ('Y', 'N')),
            'last_support_plan'=> $faker->dateTimeBetween(
                $startDate = '-2 years',
                $endDate = '-3 months',
                $timezone = null
            ),
            'pen_portrait'=> $faker->randomElement($array = array ('Y', 'N')),
            'outcome_star'=> $faker->randomElement($array = array ('Y', 'N')),
            'exit_address'=> $faker->streetAddress.', York',
        ];
    }
);
