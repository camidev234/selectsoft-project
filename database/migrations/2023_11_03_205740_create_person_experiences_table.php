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
        Schema::create('person_experiences', function (Blueprint $table) {
            $table->id();
            $table->string('company_experience',80);
            // $table->string('months_experience',45);
            $table->date('start_date');
            $table->date('finish_date');
            $table->string('functions', 900);
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('work_area_id')->references('id')->on('work_areas');
            $table->string('job');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('person_experiences');
    }
};
