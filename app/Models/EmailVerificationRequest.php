<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailVerificationRequest extends Model
{
    use HasFactory;

    protected $table = 'email_verification_request';
    
    protected $fillable = [
        'id_user',
        'token',
        'expired'
    ];
}
