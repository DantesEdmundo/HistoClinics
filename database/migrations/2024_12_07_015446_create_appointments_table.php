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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_patient');
            $table->unsignedBigInteger('id_doctor');
            $table->dateTime('date_time');
            // Se debe crear una tabla de estados
            $table->string('status')->default('asset'); // deje activo como predeterminado y cuando estemos en modelos debemos agregar esta caracteristica en usuarios
            $table->timestamps();
            $table->foreign('id_patient')->references('id')->on('patients');
            $table->foreign('id_doctor')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
