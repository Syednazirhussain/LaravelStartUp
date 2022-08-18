<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MechanicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mechanics')->insert([
            0 => [
                "name" => "Nasir"
            ],
            1 => [
                "name" => "Atif"
            ],
            3 => [
                "name" => "Umair"
            ]
        ]);
    }
}
