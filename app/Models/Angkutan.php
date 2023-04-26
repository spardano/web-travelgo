<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Angkutan extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'angkutans';

    protected $fillable = [
        'nama_angkutan',
        'jenis_angkutan',
        'merek_kendaraan',
        'nomor_kendaraan',
    ];
}
