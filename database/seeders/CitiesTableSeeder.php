<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            ['city_name' => 'Medellín', 'departament_id' => 2],
            ['city_name' => 'Envigado', 'departament_id' => 2],
            ['city_name' => 'Bello', 'departament_id' => 2],
            // ... otras ciudades ...
        ];

        DB::table('cities')->insert($cities);
    }
    }

