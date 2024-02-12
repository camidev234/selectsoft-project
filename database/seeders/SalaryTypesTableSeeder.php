<?php

namespace Database\Seeders;

use App\Models\Salaries_type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalaryTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $salaryType = new Salaries_type();

        $salaryType->salary_type = "Salario fijo";
        $salaryType->save();

        $salaryType = new Salaries_type();

        $salaryType->salary_type = "Salario en especie";
        $salaryType->save();

        $salaryType = new Salaries_type();

        $salaryType->salary_type = "Salario integral";
        $salaryType->save();

        $salaryType = new Salaries_type();

        $salaryType->salary_type = "Salario minimo mensual legal vigente";
        $salaryType->save();

        $salaryType = new Salaries_type();

        $salaryType->salary_type = "Salario mixto";
        $salaryType->save();


    }
}
