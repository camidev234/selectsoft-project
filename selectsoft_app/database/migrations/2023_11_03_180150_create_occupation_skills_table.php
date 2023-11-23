<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PHPUnit\Event\Telemetry\GarbageCollectorStatus;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('occupation_skills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ability_id')->references('id')->on('abilities');
            $table->foreignId('occupation_id')->references('id')->on('occupations');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('occupation_skills');
    }
};
