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
        Schema::create('rental', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paket_id')->nullable()
                ->references('id')->on('paket');
            $table->date('tgl_rental');
            $table->date('tgl_kembali');
            $table->date('tgl_pengembalian');
            $table->boolean('rental_selesai');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rental');
    }
};
