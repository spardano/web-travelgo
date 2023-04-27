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
        Schema::create('bangkus', function (Blueprint $table) {
            $table->id();
            $table->integer('id_angkutan');
            $table->smallInteger('jumlah_baris');
            $table->smallInteger('jumlah_kolom');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bangkus');
    }
};
