<?php

use Faker\Generator as Faker;

//$faker = Faker::create();
//$h_rooms = House::all()->pluck('id').'-'.pluck('no_rooms')->toArray();

$factory->define(
    App\Room::class, function (Faker $faker) {
        return [
            'house_id'=>random_int(\DB::table('houses')->min('id'), \DB::table('houses')->max('id')),
            'tenant_id'=>random_int(\DB::table('tenants')->min('id'), \DB::table('tenants')->max('id')),
            //'room_no'=>random_int(1, \DB::table('houses')->'id.no_rooms'),
            'room_no'=>random_int(1, 5), // need to change this to valid house/room combos
            'in_room'=> '2018-10-01', //now(), // need to change to valid dates \DB::table('houses.live'),
            'out_room'=>null, // need to populate when room is needed
        ];
    }
);
