<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AreaKerja;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    function checkGeometry(Request $request)
    {
        $polygon = AreaKerja::find(4);
        return $polygon->geometri_number;
    }
}
