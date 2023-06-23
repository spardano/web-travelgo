<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Angkutan;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class PemesananController extends Controller
{
    public function jadwal()
    {
        $data = Jadwal::with(['angkutan', 'trayek', 'jenis_kelas'])->get();

        $data_baru = array();
        $multiplied = $data->map(function ($item) {
            $temp['nama_angkutan'] = $item->angkutan->nama_angkutan;
            $temp['nama_kelas'] = $item->jenis_kelas->namaKelas;
            $temp['harga'] = $item->trayek->harga_basis + $item->jenis_kelas->penambahanBiaya;
            $temp['nama_trayek'] = $item->trayek->nama_trayek;
            $temp['thumbnail'] = $item->angkutan->getMedia();
            return $temp;
        });

        $data_baru = $multiplied->all();

        if ($data_baru) {
            return response()->json([
                'status' => true,
                'data' => $data_baru
            ]);
        }

        return response()->json([
            'status' => false,
            "message" => 'data tidak ditemukan'
        ]);
    }
}
