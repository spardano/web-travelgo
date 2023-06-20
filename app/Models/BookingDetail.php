<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_booking',
        'id_tiket',
        'nama_penumpang',
        'nomor_hp_wa',
        'harga_tiket',
        'penambahan_biaya',
        'keterangan_pemabahan_biaya',
        'alamat_penjemputan',
        'alamat_pengantaran',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'id_booking');
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'id_tiket');
    }
}
