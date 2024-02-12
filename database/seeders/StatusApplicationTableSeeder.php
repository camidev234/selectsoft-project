<?php

namespace Database\Seeders;

use App\Models\Status_aplications;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusApplicationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newStatus = new Status_aplications();
        $newStatus->status_name = 'Postulado';
        $newStatus->save();

        $newStatus = new Status_aplications();
        $newStatus->status_name = 'Cv Visto';
        $newStatus->save();

        $newStatus = new Status_aplications();
        $newStatus->status_name = 'Seleccionado';
        $newStatus->save();

        $newStatus = new Status_aplications();
        $newStatus->status_name = 'Finalista';
        $newStatus->save();
    }
}
