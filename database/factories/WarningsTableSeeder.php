<?php

use Illuminate\Database\Seeder;

class WarningsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Warning', 20)->create();
    }
}
