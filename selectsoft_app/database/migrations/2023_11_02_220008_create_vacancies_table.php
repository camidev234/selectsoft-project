<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->string('vacancie_code')->unique();
            $table->string('skills',500)->default('Niinguna');
            $table->unsignedBigInteger('required_experience');
            $table->string('salary_range',45);
            $table->unsignedSmallInteger('number_vacancies');
            $table->foreignId('charge_id')->references('id')->on('charges')->onDelete('cascade');
            $table->string('schedule',55);
            $table->foreignId('work_day_id')->references('id')->on('work_days');
            $table->foreignId('salaries_type_id')->references('id')->on('salaries_types');
            $table->string('applicant_person');
            $table->foreignId('country_id')->references('id')->on('countries');
            $table->foreignId('city_id')->references('id')->on('cities');
            $table->string('annotations',400)->nullable();
            $table->foreignId('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacancies');
    }
};
