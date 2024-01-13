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
        Schema::create('rental_tenda', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rental_id')->references('id')->on('rental');
            $table->foreignId('tenda_id')->references('id')->on('tenda');
            $table->integer('jumlah');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rental_tenda');
    }
};
