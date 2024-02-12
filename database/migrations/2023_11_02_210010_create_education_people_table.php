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
        Schema::create('education_people', function (Blueprint $table) {
            $table->id();
            $table->string('shcool_name', 100);
            $table->string('obtained_title');
            $table->foreignId('study_status_id')->references('id')->on('study_statuses');
            $table->foreignId('study_level_id')->references('id')->on('study_levels');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education_people');
    }
};
