<?php

use Illuminate\Database\Seeder;

class CasenotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Casenote', 80)->create();
    }
}
