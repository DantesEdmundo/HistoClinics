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
        Schema::create('medical_order', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_medical_record');
            $table->text('diagnosis');
            $table->unsignedBigInteger('id_order_type');
            $table->string('description_order');
            $table->dateTime('date_time');
            $table->timestamps();
            $table->foreign('id_order_type')->references('id')->on('order_type');
            $table->foreign('id_medicañ_record')->references('id')->on('medical_records');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_order');
    }
};
