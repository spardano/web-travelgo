<?php

namespace App\Services\Midtrans;

use App\Models\Booking;
use App\Models\User;
use Midtrans\Snap;

class CreateSnapTokenService extends Midtrans
{
    protected $payment;

    public function __construct($payment)
    {
        parent::__construct();

        $this->payment = $payment;
    }

    public function getSnapToken()
    {
        $booking = Booking::where('id', $this->payment->id_booking)->first();
        $user = User::find($this->payment->id_customer);
        $name = explode(' ', $user->name);
        $params = [
            'transaction_details' => [
                'order_id' => $this->payment->number,
                'gross_amount' => $this->payment->gross_amount,
            ],

            'item_details' => [
                [
                    'id' => $booking->id,
                    'price' => $booking->total_biaya,
                    'quantity' => 1,
                    'name' => $booking->user->name
                ]
            ],

            'customer_details' => [
                'first_name' => $name[0],
                'last_name' => isset($name[1])? $name[1] : null,
                'email' => $user['email'],
                'phone' => "082283445039",
            ]
        ];

        $snapToken = Snap::getSnapToken($params);

        return $snapToken;
    }
}
