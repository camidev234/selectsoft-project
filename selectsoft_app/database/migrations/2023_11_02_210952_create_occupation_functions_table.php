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
        Schema::create('occupation_functions', function (Blueprint $table) {
            $table->id();
            $table->string('function', 500);
            $table->unsignedBigInteger('occupation_id');
            $table->foreign('occupation_id')->references('id')->on('occupations');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('occupation_functions');
    }
};
