<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            0 => [
                "name" => "Pakistan"
            ],
            1 => [
                "name" => "India"
            ],
            3 => [
                "name" => "Srilanka"
            ],
            4 => [
                "name" => "Bangladesh"
            ],
            5 => [
                "name" => "China"
            ]
        ]);
    }
}
