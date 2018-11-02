<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{

     /**
      * Run the database seeds.
      *
      * @return void
      */
    public function run()
    {
        \DB::table('users')->insert
        ([
            'id'=>'1',
            'name'=>'Ritchie Dealtry',
            'email'=>'ritchie@dealtry.org',
            'password'=>bcrypt('Ritchie'),

            ]
        );
        \DB::table('users')->insert([
            'id'=>'2',
            'name'=>'Ed Hambleton',
            'email'=>'ed.hambleton@restoreyork.co.uk',
            'password'=>bcrypt('Laura123'),
            ]
        );
        \DB::table('users')->insert([
            'id'=>'3',
            'name'=>'User',
            'email'=>'usern@user.com',
            'password'=>bcrypt('User123'),
            ]
        );

    }
}
