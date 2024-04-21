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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
            $table->foreignId('vacant_id')->references('id')->on('vacancies')->onDelete('cascade');
            $table->foreignId('status_applications_id')->references('id')->on('status_aplications');
            $table->unsignedBigInteger('education_score')->nullable()->default(0);
            $table->unsignedBigInteger('interview_score')->nullable()->default(0);
            $table->unsignedBigInteger('technical_test_score')->nullable()->default(0);
            $table->unsignedBigInteger('experiencie_score')->nullable()->default(0);
            $table->unsignedBigInteger('tersonality_test')->nullable()->default(0);
            $table->unsignedBigInteger('total_score')->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
