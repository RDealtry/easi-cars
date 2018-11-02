<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            [
                UsersTableSeeder::class,
                HousesTableSeeder::class,
                TenantsTableSeeder::class,
                CertificatesTableSeeder::class,
                RoomsTableSeeder::class,
                CasenotesTableSeeder::class,
                WarningsTableSeeder::class,
                ]
        );
    }
}
