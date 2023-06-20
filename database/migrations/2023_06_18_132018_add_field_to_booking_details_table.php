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
        Schema::table('booking_details', function (Blueprint $table) {
            $table->string('nama_penumpang')->nullable();
            $table->string('nomor_hp_wa')->nullable();
            $table->string('harga_tiket')->nullable();
            $table->string('penambahan_biaya')->nullable();
            $table->string('keterangan_pemabahan_biaya')->nullable();
            $table->text('alamat_penjemputan')->nullable();
            $table->text('alamat_pengantaran')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('booking_details', function (Blueprint $table) {
            //
        });
    }
};
