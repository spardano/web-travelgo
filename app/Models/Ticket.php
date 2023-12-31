<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'id_jadwal',
        'id_seat',
        'harga_tiket',
        'status_tiket'
    ];

    public function detailBangku()
    {
        return $this->hasOne(DetailBangku::class, 'id', 'id_seat');
    }

    public function bookingDetail()
    {
        return $this->hasMany(BookingDetail::class, 'id_tiket');
    }

    public function jadwal()
    {
        return $this->hasOne(Jadwal::class, 'id', 'id_jadwal');
    }
}
