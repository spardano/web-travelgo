<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DetailBangku extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'id_angkutan',
        'baris',
        'kolom',
        'kode_bangku',
        'ketersediaan',
    ];

    public function tiket()
    {
        return $this->hasOne(Ticket::class, 'id_seat');
    }
}
