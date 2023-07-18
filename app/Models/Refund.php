<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Refund extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $table = 'refund';

    protected $fillable = [
        'id_customer',
        'id_booking',
        'rekening',
        'bank',
        'atas_nama',
        'status',
        'no_transaksi',
        'alasan',
        'alasan_penolakan',
        'besaran_refund'
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
