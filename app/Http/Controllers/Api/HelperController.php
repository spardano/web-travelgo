<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AreaKerja;
use Illuminate\Http\Request;

class HelperController extends Controller
{
    function getKabKota()
    {
        $areaKerja = AreaKerja::with('kabupatenKota')->get();

        return response()->json([
            'status' => true,
            'data' => $areaKerja
        ]);
    }
}
