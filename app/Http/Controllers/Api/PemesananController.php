<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Angkutan;
use App\Models\Booking;
use App\Models\Jadwal;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class PemesananController extends Controller
{
    public function jadwal(Request $request)
    {

        if ($request->filter) {
            $data = Jadwal::with(['angkutan', 'trayek' => function ($query) use ($request) {

                if ($request->filter['s_area_keberangkatan']) {
                    $query->where('id_area_asal', $request->filter['s_area_keberangkatan']);
                }

                if ($request->filter['s_area_tujuan']) {
                    $query->where('id_area_tujuan', $request->filter['s_area_tujuan']);
                }
            }, 'jenis_kelas'])->where('tgl_keberangkatan', '=', $request->filter['s_tgl_keberangkatan'])->get();
        } else {
            $data = Jadwal::with(['angkutan', 'trayek', 'jenis_kelas'])->get();
        }


        $data_baru = array();
        $multiplied = $data->map(function ($item) {

            $wkt = explode(" ", $item->tgl_keberangkatan);
            $tiket_tersedia = Ticket::where('id_jadwal', $item->id)->where('status_tiket', '!=', 3)->count();

            $temp['nama_angkutan'] = $item->angkutan->nama_angkutan;
            $temp['nama_kelas'] = $item->jenis_kelas->namaKelas;
            $temp['harga'] = $item->trayek->harga_basis + $item->jenis_kelas->penambahanBiaya;
            $temp['nama_trayek'] = $item->trayek->nama_trayek;
            $temp['kota_keberangkatan'] = $item->trayek->areaAsal->kabupatenKota->nama_kab_kota;
            $temp['kota_tujuan'] =  $item->trayek->areaTujuan->kabupatenKota->nama_kab_kota;
            $temp['thumbnail'] = $item->angkutan->getMedia();
            $temp['tanggal_berangkat'] = $wkt[0];
            $temp['waktu_berangkat'] = $wkt[1];
            $temp['tiket_tersedia'] = $tiket_tersedia;
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
