<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    use HasFactory;
    protected $table = 'refund';

    protected $fillable = [
        'id_customer',
        'id_booking',
        'rekening',
        'bank',
        'atas_nama',
        'status',
        'no_transaksi',
        'alasan'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_customer');
    }

    public function booking()
    {
        return $this->hasOne(User::class, 'id', 'id_booking');
    }
}
