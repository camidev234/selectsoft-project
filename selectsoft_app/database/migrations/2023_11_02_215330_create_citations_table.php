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
        Schema::create('citations', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('message',400);
            $table->string('place',100);
            $table->foreignId('person_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('selector_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citations');
    }
};
