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
            $table->string('competencies',350);
            $table->unsignedBigInteger('required experience');
            $table->string('salary range',45);
            $table->unsignedSmallInteger('number_vacancies');
            $table->foreignId('job_id')->references('id')->on('charges');
            $table->string('schedule',80);
            $table->foreignId('workDays_id')->references('id')->on('workdays');
            $table->foreignId('salariesType_id')->references('id')->on('salaries_types');
            $table->string('applicant_person');
            $table->foreignId('country_id')->references('id')->on('countries');
            $table->string('annotations',100)->nullable();
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
