<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiketTravel extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_jadwal',
        'bangku',
        'status',
    ];
}
