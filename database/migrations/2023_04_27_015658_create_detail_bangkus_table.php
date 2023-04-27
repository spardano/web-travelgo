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
        Schema::create('detail_bangkus', function (Blueprint $table) {
            $table->integer('id_angkutan');
            $table->smallInteger('baris');
            $table->smallInteger('kolom');
            $table->string('kode_bangku');
            $table->smallInteger('ketersediaan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_bangkus');
    }
};
