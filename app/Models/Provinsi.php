<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_provinsi',
        'alt_nama',
        'lat',
        'long',
    ];

    public function kabupatenKota()
    {
        return $this->hasMany(KabupatenKota::class, 'id_provinsi');
    }
}
