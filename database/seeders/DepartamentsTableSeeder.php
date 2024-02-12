<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departaments = [
            ['departament_name' => 'Amazonas', 'country_id' => 37],
            ['departament_name' => 'Antioquia', 'country_id' => 37],
            ['departament_name' => 'Arauca', 'country_id' => 37],
            ['departament_name' => 'Atlántico', 'country_id' => 37],
            ['departament_name' => 'Bolívar', 'country_id' => 37],
            ['departament_name' => 'Boyacá', 'country_id' => 37],
            ['departament_name' => 'Caldas', 'country_id' => 37],
            ['departament_name' => 'Caquetá', 'country_id' => 37],
            ['departament_name' => 'Casanare', 'country_id' => 37],
            ['departament_name' => 'Cauca', 'country_id' => 37],
            ['departament_name' => 'Cesar', 'country_id' => 37],
            ['departament_name' => 'Chocó', 'country_id' => 37],
            ['departament_name' => 'Córdoba', 'country_id' => 37],
            ['departament_name' => 'Cundinamarca', 'country_id' => 37],
            ['departament_name' => 'Guainía', 'country_id' => 37],
            ['departament_name' => 'Guaviare', 'country_id' => 37],
            ['departament_name' => 'Huila', 'country_id' => 37],
            ['departament_name' => 'La Guajira', 'country_id' => 37],
            ['departament_name' => 'Magdalena', 'country_id' => 37],
            ['departament_name' => 'Meta', 'country_id' => 37],
            ['departament_name' => 'Nariño', 'country_id' => 37],
            ['departament_name' => 'Norte de Santander', 'country_id' => 37],
            ['departament_name' => 'Putumayo', 'country_id' => 37],
            ['departament_name' => 'Quindío', 'country_id' => 37],
            ['departament_name' => 'Risaralda', 'country_id' => 37],
            ['departament_name' => 'San Andrés y Providencia', 'country_id' => 37],
            ['departament_name' => 'Santander', 'country_id' => 37],
            ['departament_name' => 'Sucre', 'country_id' => 37],
            ['departament_name' => 'Tolima', 'country_id' => 37],
            ['departament_name' => 'Valle del Cauca', 'country_id' => 37],
            ['departament_name' => 'Vaupés', 'country_id' => 37],
            ['departament_name' => 'Vichada', 'country_id' => 37],
        ];

        DB::table('departaments')->insert($departaments);
    }
}
