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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('jumlah_tiket');
            $table->timestamp('waktu_booking');
            $table->bigInteger('id_customer');
            $table->text('titik_jemput')->nullable();
            $table->text('titik_antar')->nullable();
            $table->integer('total_biaya');
            $table->smallInteger('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
