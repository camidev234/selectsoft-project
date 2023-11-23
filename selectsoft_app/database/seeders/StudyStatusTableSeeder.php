<?php

namespace Database\Seeders;

use App\Models\study_status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudyStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $studyStatus = new study_status();

        $studyStatus-> study_status = 'Terminado';

        $studyStatus->save();


        $studyStatus = new study_status();

        $studyStatus-> study_status = 'En curso';

        $studyStatus->save();
    }
}
