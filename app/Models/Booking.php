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
        'biaya_admin',
        'status',
        'tk_biaya',
    ];

    public function bookingDetail()
    {
        return $this->hasMany(BookingDetail::class, 'id_booking');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_customer');
    }

    public function paymentTransaction()
    {
        return $this->belongsTo(PaymentTransactions::class, 'id', 'id_booking');
    }
}
