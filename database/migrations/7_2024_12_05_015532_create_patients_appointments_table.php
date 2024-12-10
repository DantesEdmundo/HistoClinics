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
        Schema::create('patients_appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_patient');
            $table->unsignedBigInteger('id_appointment');
            $table->timestamps();
            $table->foreign('id_patient')->references('id')->on('patients');
            $table->foreign('id_appointment')->references('id')->on('appointments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients_appointments');
    }
};
