<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\MechanicSeeder;
use Database\Seeders\CountrySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            MechanicSeeder::class,
            CountrySeeder::class
        ]);
        \App\Models\User::factory(1000)->create();
    }
}
