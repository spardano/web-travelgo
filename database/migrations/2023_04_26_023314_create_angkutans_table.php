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
        Schema::create('angkutans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_angkutan');
            $table->string('jenis_angkutan');
            $table->string('merek_kendaraan');
            $table->string('nomor_kendaraan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('angkutans');
    }
};
