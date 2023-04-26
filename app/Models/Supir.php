<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Supir extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $table = 'supirs';
    protected $fillable = [
        'nama_supir',
        'nomor_ktp',
        'nomor_sim',
        'jenis_sim',
        'foto_ktp',
        'foto_sim',
        'alamat',
        'nomor_telp',
        'nama_kontak_darurat',
        'nomor_darurat',
        'tanggal_mulai_bekerja',
        'status',
    ];
}
