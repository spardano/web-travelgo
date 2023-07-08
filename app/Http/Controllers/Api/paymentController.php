<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\PaymentTransactions;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class paymentController extends Controller
{
    public function makePayment(Request $request)
    {
        $booking = Booking::with(['bookingDetail', 'user'])->where('id', $request->id_booking)->first();

        $payment = PaymentTransactions::create([
            'number' => Str::orderedUuid(),
            'id_booking' => $booking->id,
            'id_customer' => $request->user['id'],
            'gross_amount' => $booking->total_biaya,
            'payment_status' => 1,
        ]);

        if ($payment) {
            return response()->json([
                'status' => true,
                'data' => $payment,
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'gagal menambahkan order'
        ]);
    }
}
