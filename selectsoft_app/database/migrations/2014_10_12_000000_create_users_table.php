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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->foreignId('document_type_id')->references('id')->on('document_types');
            $table->string('number_document')->unique();
            $table->string('telephone');
            $table->string('phone_number')->default('N/A');
            $table->string('address');
            $table->unsignedBigInteger('id_country');
            $table->unsignedBigInteger('id_department');
            $table->unsignedBigInteger('id_city');
            $table->date('birthdate');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('role_id')->references('id')->on('roles');
            $table->foreign('id_country')->references('id')->on('countries');
            $table->foreign('id_department')->references('id')->on('departaments');
            $table->foreign('id_city')->references('id')->on('cities');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
