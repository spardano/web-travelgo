<?php

namespace App\Http\Controllers;

use App\Mail\confirmPaymentMail;
use App\Models\Booking;
use App\Models\PaymentTransactions;
use App\Models\Ticket;
use App\Services\Midtrans\CallbackService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

                $booking = Booking::where('id', $payment->id_booking)->first();
                $booking->status = 2;

                foreach ($booking->bookingDetail as  $item) {
                    Ticket::where('id', $item->ticket->id)->update([
                        'status_tiket' => 3
                    ]);
                }

                $booking->save();

                //send confirmation email
                Mail::to($booking->user->email)->send(new confirmPaymentMail($booking->id));
            }

            if ($callback->isExpire()) {
                PaymentTransactions::where('id', $payment->id)->update([
                    'payment_status' => 3,
                ]);

                $booking = Booking::where('id', $payment->id_booking)->first();
                $booking->status = 3;

                foreach ($booking->bookingDetail as  $item) {
                    Ticket::where('id', $item->ticket->id)->update([
                        'status_tiket' => 1
                    ]);
                }

                $booking->save();
            }

            if ($callback->isCancelled()) {
                PaymentTransactions::where('id', $payment->id)->update([
                    'payment_status' => 4,
                ]);

                $booking = Booking::where('id', $payment->id_booking)->first();
                $booking->status = 4;

                foreach ($booking->bookingDetail as  $item) {
                    Ticket::where('id', $item->ticket->id)->update([
                        'status_tiket' => 1
                    ]);
                }

                $booking->save();
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

    public function success()
    {
        return view('payment.success');
    }

    public function error()
    {
        return view('payment.error');
    }
}
