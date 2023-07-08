<?php

namespace App\Http\Controllers;

use App\Models\PaymentTransactions;
use App\Services\Midtrans\CallbackService;
use Illuminate\Http\Request;

class PaymentCallbackController extends Controller
{
    public function receive()
    {
        $callback = new CallbackService;


        if ($callback->isSignatureKeyVerified()) {
            $notification = $callback->getNotification();
            $payment = $callback->getPayment();

            if ($callback->isSuccess()) {
                PaymentTransactions::where('id', $payment->id)->update([
                    'payment_status' => 2,
                ]);
            }

            if ($callback->isExpire()) {
                PaymentTransactions::where('id', $payment->id)->update([
                    'payment_status' => 3,
                ]);
            }

            if ($callback->isCancelled()) {
                PaymentTransactions::where('id', $payment->id)->update([
                    'payment_status' => 4,
                ]);
            }

            return response()
                ->json([
                    'success' => true,
                    'message' => 'Notifikasi berhasil diproses',
                ], 200);
        } else {
            return response()
                ->json([
                    'error' => true,
                    'message' => 'Signature key tidak terverifikasi',
                ], 403);
        }
    }
}
