<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bangku extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_angkutan',
        'jumlah_kolom',
        'jumlah_baris',
    ];

    public function detail_bangku()
    {
        return $this->hasMany(DetailBangku::class, 'id_angkutan', 'id_angkutan');
    }

    public function angkutan()
    {
        return $this->belongsTo(Angkutan::class, 'id_angkutan');
    }
}
