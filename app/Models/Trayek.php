<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trayek extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_area_asal',
        'id_area_tujuan',
        'harga_basis',
        'area_persinggahan',
        'nama_trayek'
    ];



    public function areaAsal()
    {
        return $this->hasOne(AreaKerja::class, 'id', 'id_area_asal');
    }

    public function areaTujuan()
    {
        return $this->hasOne(AreaKerja::class, 'id', 'id_area_tujuan');
    }
}
