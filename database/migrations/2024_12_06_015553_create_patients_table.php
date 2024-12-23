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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->date('birthdate');
            $table->unsignedBigInteger('id_document_type');
            $table->unsignedBigInteger('id_eps');
            $table->integer('document_number');
            $table->text('address');
            $table->text('phone');
            $table->timestamps();
            $table->foreign('id_document_type')->references('id')->on('document_types');
            $table->foreign('id_eps')->references('id')->on('eps');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
