<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaPersinggahan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_trayek',
        'id_area_kerja'
    ];

    public function areaKerja()
    {
        return $this->hasOne(AreaKerja::class, 'id', 'id_area_kerja');
    }
}
