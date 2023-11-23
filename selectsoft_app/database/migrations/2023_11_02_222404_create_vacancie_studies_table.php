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
        Schema::create('vacancie_studies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('study_level_id');
            $table->unsignedBigInteger('vacancie_id');
            $table->unsignedBigInteger('study_status_id');
            $table->string('study_name');
            $table->foreign('study_level_id')->references('id')->on('study_levels');
            $table->foreign('study_status_id')->references('id')->on('study_statuses');
            $table->foreign('vacancie_id')->references('id')->on('vacancies');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacancie_studies');
    }
};
