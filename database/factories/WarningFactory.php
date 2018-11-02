<?php

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

$factory->define(
    App\Warning::class, function (Faker $faker) {
        return [
            // Possibly add "Carbon" for date/time  manipulation like add month
            'tenant_id'=>random_int(\DB::table('tenants')->min('id'), \DB::table('tenants')->max('id')),
            'user_id'=>random_int(\DB::table('users')->min('id'), \DB::table('users')->max('id')),
            'note'=>$faker->paragraph($nbSentences = 5, $variableNbSentences = true),
            'warning_date' =>$faker->dateTimeBetween(
                $startDate = '-5 years',
                $endDate = 'now',
                $timezone = null
            ),
            'reason'=> $faker->randomElement($array = array ('Non payment of topup', 'Non engagement', 'Other')),
            'warning_no'=> $faker->randomElement($array = array ('Verbal', 'First', 'Second', 'Other')),
            'manager_yn'=> $faker->randomElement($array = array ('Y', 'N')),
            'expiry_date'=> $faker->dateTimeBetween(
                $startDate = 'now',
                $endDate = '+1 years',
                $timezone = null
            ),
        ];
    }
);
