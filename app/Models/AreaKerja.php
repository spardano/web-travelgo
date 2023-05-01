<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AreaKerja extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id_kabupaten',
        'geometri_number'
    ];

    public function kabupatenKota()
    {
        return $this->hasOne(KabupatenKota::class, 'id', 'id_kabupaten');
    }
}
