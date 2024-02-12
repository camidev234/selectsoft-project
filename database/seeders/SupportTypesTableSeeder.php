<?php

namespace Database\Seeders;

use App\Models\support_type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupportTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $supportType = new support_type();
        $supportType->support_type = "Recomendacion";
        $supportType->save();


        $supportType = new support_type();
        $supportType->support_type = "Certificacion laboral";
        $supportType->save();


        $supportType = new support_type();
        $supportType->support_type = "Certificado estudiantil";
        $supportType->save();


        $supportType = new support_type();
        $supportType->support_type = "Diploma primaria";
        $supportType->save();


        $supportType = new support_type();
        $supportType->support_type = "Diploma bachillerato basico";
        $supportType->save();


        $supportType = new support_type();
        $supportType->support_type = "Diploma bachiller";
        $supportType->save();

        $supportType = new support_type();
        $supportType->support_type = "Diploma tecnico";
        $supportType->save();

        $supportType = new support_type();
        $supportType->support_type = "Diploma tecnologo";
        $supportType->save();

        $supportType = new support_type();
        $supportType->support_type = "Diploma pregrado";
        $supportType->save();

        $supportType = new support_type();
        $supportType->support_type = "Diploma posgrado";
        $supportType->save();

    }
}
