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
        Schema::create('supirs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_supir');
            $table->string('nomor_ktp');
            $table->string('nomor_sim');
            $table->string('jenis_sim');
            $table->string('foto_ktp')->nullable();
            $table->string('foto_sim')->nullable();
            $table->text('alamat');
            $table->string('nomor_telp');
            $table->string('nama_kontak_darurat');
            $table->string('nomor_darurat');
            $table->date('tanggal_mulai_bekerja')->nullable();
            $table->smallInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supirs');
    }
};
