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
        Schema::create('paket_rental', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rental_id')->references('id')->on('rental');
            $table->foreignId('paket_id')->references('id')->on('paket');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paket_rental');
    }
};
