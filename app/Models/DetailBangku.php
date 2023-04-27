<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
