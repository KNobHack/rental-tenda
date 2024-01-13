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
        Schema::create('paket_barang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barang_id')->references('id')->on('barang');
            $table->foreignId('paket_id')->references('id')->on('paket');
            $table->integer('jumlah');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paket_barang');
    }
};
