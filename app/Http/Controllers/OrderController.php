<?php

namespace App\Http\Controllers;

use App\Models\PaymentTransactions;
use App\Services\Midtrans\CreateSnapTokenService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($transaction_number)
    {

        $paymentTransactions = PaymentTransactions::where('number', $transaction_number)->first();
        $snapToken = $paymentTransactions->snap_token;
        if (is_null($snapToken)) {
            // If snap token is still NULL, generate snap token and save it to database

            $midtrans = new CreateSnapTokenService($paymentTransactions);
            $snapToken = $midtrans->getSnapToken();

            $paymentTransactions->snap_token = $snapToken;
            $paymentTransactions->save();
        }

        return view('payment.show', compact('paymentTransactions', 'snapToken'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaymentTransactions $paymentTransactions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PaymentTransactions $paymentTransactions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaymentTransactions $paymentTransactions)
    {
        //
    }
}
