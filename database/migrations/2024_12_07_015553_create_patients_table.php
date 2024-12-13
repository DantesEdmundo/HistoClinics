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
            $table->integer('document_number');
            $table->text('address');
            $table->integer('phone');
            $table->string('EPS_affiliate');
            $table->string('affiliate_type');
            $table->timestamps();
            $table->foreign('id_document_type')->references('id')->on('document_types');
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
