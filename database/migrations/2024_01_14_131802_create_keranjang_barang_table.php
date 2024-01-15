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
        Schema::create('keranjang_barang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('keranjang_id')->references('id')->on('keranjang');
            $table->foreignId('barang_id')->references('id')->on('barang');
            $table->integer('jumlah');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keranjang_barang');
    }
};
