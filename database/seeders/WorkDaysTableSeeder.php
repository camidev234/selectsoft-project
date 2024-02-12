<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkDaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $workDays = [
            ['working_day' => 'Jornada Completa'],
            ['working_day' => 'Jornada Reducida'],
            ['working_day' => 'Jornada Acumulativa'],
            ['working_day' => 'Jornada Nocturna'],
            ['working_day' => 'Jornada Mixta'],
            ['working_day' => 'Jornada Continua'],
            ['working_day' => 'Jornada Por Turnos'],
            ['working_day' => 'Jornada de Trabajo en Días Domingos y Festivos']
        ];

        DB::table('work_days')->insert($workDays);
    }
}
