<?php

namespace Database\Seeders;

use App\Models\study_level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudyLevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $newLevel = new study_level();

        $newLevel->study_level = "Preescolar";
        $newLevel->save();


        $newLevel = new study_level();

        $newLevel->study_level = "Basica primaria";
        $newLevel->save();


        $newLevel = new study_level();

        $newLevel->study_level = "Basica secundaria";
        $newLevel->save();


        $newLevel = new study_level();

        $newLevel->study_level = "Educacion media";
        $newLevel->save();

        $newLevel = new study_level();

        $newLevel->study_level = "Capacitacion";
        $newLevel->save();

        $newLevel = new study_level();

        $newLevel->study_level = "Tecnico";
        $newLevel->save();


        $newLevel = new study_level();

        $newLevel->study_level = "Tecnologo";
        $newLevel->save();

        $newLevel = new study_level();

        $newLevel->study_level = "Pregrado";
        $newLevel->save();

        $newLevel = new study_level();

        $newLevel->study_level = "Posgrado";
        $newLevel->save();



    }
}
