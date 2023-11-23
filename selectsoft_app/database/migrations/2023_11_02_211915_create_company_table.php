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
        Schema::create('company', function (Blueprint $table) {
            $table->id();
            $table->string('nit', 45);
            $table->string('business_name',45);
            $table->string('phone',45);
            $table->foreignId('city_id')->constrained('cities')->onDelete('cascade');
            $table->string('email',100);
            $table->string('address',45);
            $table->foreignId('recruiter_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('selector_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company');
    }
};
