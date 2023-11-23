<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('candidate_supports', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('person_id')->references('id')->on('users');
            $table->foreignId('support_type_id')->references('id')->on('support_types');
            $table->string('support_file',100);
            $table->foreignId('candidate_id')->references('id')->on('candidates');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_supports');
    }
};
