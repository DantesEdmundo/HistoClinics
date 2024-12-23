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
        Schema::create('medical_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_patient');
            $table->unsignedBigInteger('id_doctor');
            $table->unsignedBigInteger('id_current_eps');
            $table->text('description');
            $table->timestamps();
            $table->foreign('id_doctor')->references('id')->on('users');
            $table->foreign('id_patient')->references('id')->on('patients');
            $table->foreign('id_current_eps')->references('id')->on('eps');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_records');
    }
};
