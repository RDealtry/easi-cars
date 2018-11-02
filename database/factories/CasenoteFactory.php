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
    App\Casenote::class, function (Faker $faker) {
        return [
            // Possibly add "Carbon" for date/time  manipulation like add month
            'tenant_id'=>random_int(\DB::table('tenants')->min('id'), \DB::table('tenants')->max('id')),
            'user_id'=>random_int(\DB::table('users')->min('id'), \DB::table('users')->max('id')),
            'note'=>$faker->paragraph($nbSentences = 5, $variableNbSentences = true),
            'casenote_date' =>$faker->dateTimeBetween(
                $startDate = '-5 years',
                $endDate = 'now',
                $timezone = null
            ),
        ];
    }
);
