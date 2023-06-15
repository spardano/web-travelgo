<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'jumlah_tiket',
        'waktu_booking',
        'id_customer',
        'titik_jemput',
        'titik_antar',
        'total_biaya',
        'status',
    ];
}
