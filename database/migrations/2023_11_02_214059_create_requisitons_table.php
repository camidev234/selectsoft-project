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
            $table->foreignId('charge_id')->references('id')->on('charges')->onDelete('cascade');
            $table->unsignedSmallInteger('number_vacancies');
            $table->unsignedBigInteger('required_experience');
            $table->foreignId('company_id')->references('id')->on('companies')->onDelete('cascade');
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
