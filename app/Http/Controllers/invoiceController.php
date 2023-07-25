<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Ticket;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class invoiceController extends Controller
{
    public function invoice($id_booking)
    {
        $booking = Booking::find($id_booking);

        return Pdf::loadView('print.invoice', ['booking' => $booking])->stream();
    }


    public function tiket($id_booking, $id_tiket)
    {
        $tiket = Ticket::find($id_tiket);
        $booking = Booking::find($id_booking);
        return $pdf = Pdf::loadView('print.tiketview', ['booking' => $booking, 'tiket' => $tiket])->setPaper(array(0, 0, 600, 197))->stream();
    }
}
