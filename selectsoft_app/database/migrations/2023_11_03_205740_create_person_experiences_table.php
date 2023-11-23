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
            $table->string('months_experience',45);
            $table->foreignId('candidate_id')->references('id')->on('candidates');
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
