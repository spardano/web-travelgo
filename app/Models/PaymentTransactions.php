<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentTransactions extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'id_booking',
        'id_customer',
        'gross_amount',
        'payment_status',
        'snap_token',
    ];

    public function booking()
    {
        return $this->hasOne(Booking::class, 'id', 'id_booking');
    }
}
