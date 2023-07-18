<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\bank as ModelsBank;
use App\Models\Booking;
use App\Models\models\bank;
use App\Models\Refund;
use Illuminate\Http\Request;

class refundController extends Controller
{
    public function storeRefund(Request $request)
    {
        $booking =  Booking::where('id', $request->id_booking)->first();

        $pemotongan = (25 / 100) * $booking->total_biaya;
        $besaran_refund = $booking->total_biaya - $pemotongan;

        $refund = Refund::create([
            'id_customer' => $request->user['id'],
            'id_booking' => $request->id_booking,
            'rekening' => $request->datarefund['rekening'],
            'bank' => $request->datarefund['bank'],
            'atas_nama' => $request->datarefund['atas_nama'],
            'status' => 0,
            'no_transaksi' => $request->datarefund['no_transaksi'],
            'alasan' => $request->datarefund['alasan'],
            'besaran_refund' => $besaran_refund,
        ]);
        if ($refund) {
            $booking->status = 5;
            $booking->save();
            return response()->json([
                'status' => true,
                'massage' => "Pengajuan refun berhasil"
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => "pengajuan refund gagal"
        ]);
    }

    public function getBank()
    {
        $bank = ModelsBank::all();
        if ($bank) {
            return response()->json([
                'status' => true,
                'data' => $bank
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => "Bank Tidak Terdaftar di Aplikasi kami"
        ]);
    }
}
