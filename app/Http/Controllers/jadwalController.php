<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\JenisKelas;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class jadwalController extends Controller
{
    public function jadwal()
    {
        $data = Jadwal::with(['angkutan', 'trayek', 'jenis_kelas'])->get();
        $data_baru = array();
        $multiplied = $data->map(function ($item) {

            $wkt = explode(" ", $item->tgl_keberangkatan);
            $tiket_tersedia = Ticket::where('id_jadwal', $item->id)->where('status_tiket', '!=', 3)->count();

            $media = $item->angkutan->getMedia('foto_kendaraan')->where('model_id', $item->angkutan->id)->first();

            $temp['id_jadwal'] = $item->id;
            $temp['nama_angkutan'] = $item->angkutan->nama_angkutan;
            $temp['nama_kelas'] = $item->jenis_kelas->namaKelas;
            $temp['harga'] = $item->trayek->harga_basis + $item->jenis_kelas->penambahanBiaya;
            $temp['nama_trayek'] = $item->trayek->nama_trayek;
            $temp['kelas'] = $item->jenis_kelas->namaKelas;
            $temp['tanggal_berangkat'] = $wkt[0];
            $temp['waktu_berangkat'] = $wkt[1];
            $temp['tiket_tersedia'] = $tiket_tersedia;
            return $temp;
        });

        $data_baru = $multiplied->all();
        return view('welcome', compact('data_baru'));
    }
}