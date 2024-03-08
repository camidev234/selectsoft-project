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
        Schema::create('requisitons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('charge_id')->references('id')->on('charges');
            $table->string('job_description', 1200);
            $table->string('justification', 1500);
            $table->string('ideal_candidate', 700);
            $table->string('mission_charge', 700);
            $table->string('responsabilities', 700);
            $table->string('candidate_description', 700);
            $table->string('candidate_talents', 700);
            $table->string('selection_criteria', 700);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requisitons');
    }
};
