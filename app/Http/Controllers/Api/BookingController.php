<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AreaKerja;
use App\Models\Jadwal;
use App\Models\Trayek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    function checkGeometry(Request $request)
    {
        $jadwal = Jadwal::find($request->id_jadwal);
        $area_persinggahan = json_decode($jadwal->trayek->area_persinggahan);

        $area_coverage = [];
        foreach ($area_persinggahan as $item) {
            $temp['area_coverage'] = $item->area_persinggahan;
            $temp['tk_biaya'] = $item->tk_biaya;
            array_push($area_coverage, $temp);
        }

        if ($request->type == 'penjemputan') {
            $init_asal['area_coverage'] = $jadwal->trayek->id_area_asal;
            $init_asal['tk_biaya'] = 0;
            array_push($area_coverage, $init_asal);

            foreach ($area_coverage as $area) {
                $raw = DB::select("select ST_AsGeoJson(geometri_number) as geom from area_kerjas where id = ?", [$area['area_coverage']])[0]->geom;
                $areakerja = AreaKerja::find($area['area_coverage']);

                $data['area_coverage'] = $area['area_coverage'];
                $data['tk_biaya'] = $area['tk_biaya'];
                $data['kab_kota'] = $areakerja->kabupatenKota->nama_kab_kota;
                $polygon = json_decode($raw);

                if ($this->isPointInsidePolygon($request->lat, $request->lng, $polygon->coordinates[0])) {
                    return response()->json([
                        'status' => true,
                        'data' => $data
                    ]);
                }
            }

            return response()->json([
                'status' => false,
                'message' => 'Maaf, Lokasi anda belum masuk dalam wilayah penjemputan kami'
            ]);
        }

        if ($request->type == 'pengantaran') {
            $init_antar['area_coverage'] = $jadwal->trayek->id_area_tujuan;
            $init_antar['tk_biaya'] = 0;
            array_push($area_coverage, $init_antar);

            foreach ($area_coverage as $area) {
                $raw = DB::select("select ST_AsGeoJson(geometri_number) as geom from area_kerjas where id = ?", [$area['area_coverage']])[0]->geom;
                $areakerja = AreaKerja::find($area['area_coverage']);

                $data['area_coverage'] = $area['area_coverage'];
                $data['tk_biaya'] = $area['tk_biaya'];
                $data['kab_kota'] = $areakerja->kabupatenKota->nama_kab_kota;

                $polygon = json_decode($raw);

                if ($this->isPointInsidePolygon($request->lat, $request->lng, $polygon->coordinates[0])) {
                    return response()->json([
                        'status' => true,
                        'data' => $data
                    ]);
                }
            }

            return response()->json([
                'status' => false,
                'message' => 'Maaf, Lokasi anda belum masuk dalam wilayah penjemputan kami'
            ]);
        }
    }

    function isPointInsidePolygon($latitude, $longitude, $polygon)
    {
        $vertices = count($polygon);
        $intersections = 0;

        // Iterate through each edge of the polygon
        for ($i = 0; $i < $vertices; $i++) {
            $j = ($i + 1) % $vertices;

            // Check if the ray cast from the point intersects with the edge
            if (
                ($polygon[$i][0] > $longitude) !== ($polygon[$j][0] > $longitude) &&
                $latitude < ($polygon[$j][1] - $polygon[$i][1]) * ($longitude - $polygon[$i][0]) / ($polygon[$j][0] - $polygon[$i][0]) + $polygon[$i][1]
            ) {
                $intersections++;
            }
        }

        // Return true if number of intersections is odd, false otherwise
        return ($intersections % 2 === 1);
    }
}
