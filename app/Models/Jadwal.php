<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwals';

    protected $fillable = [
        'id_trayek',
        'tgl_keberangkatan',
        'id_jenis_kelas',
        'id_supir',
        'status'
    ];


    public function jenis_kelas()
    {
        return $this->belongsTo(JenisKelas::class, 'id_jenis_kelas');
    }


    public function supirs()
    {
        return $this->belongsTo(Supir::class, 'id_supir');
    }
}
