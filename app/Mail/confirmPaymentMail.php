<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Mail\Mailables\Attachment;

class confirmPaymentMail extends Mailable
{
    use Queueable, SerializesModels;
    public $id_booking;
    public $data;
    /**
     * Create a new message instance.
     */
    public function __construct($id_booking)
    {
        $this->id_booking = $id_booking;
        $this->getData($this->id_booking);
    }

    public function getData($id_booking)
    {
        $booking = Booking::where('id', $id_booking)->first();

        $temp['nama_customer'] = $booking->user->name;
        $temp['email'] = $booking->user->email;
        $temp['total_harga'] = $booking->total_biaya;
        $temp['payment_number'] = $booking->paymentTransaction->number;
        $biaya_admin = 0;
        if ($booking->paymentTransaction->snap_token != null) {
            $biaya_admin = 6500;
        }
        $temp['biaya_admin'] = $biaya_admin;

        $tiket = array();
        foreach ($booking->bookingDetail as $item) {
            $temp_tiket = [
                "kode_bangku" => $item->ticket->detailBangku->kode_bangku,
                "harga_tiket" => $item->harga_tiket,
            ];
            array_push($tiket, $temp_tiket);
        }
        $temp['tiket'] = $tiket;

        return $this->data = $temp;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Confirm Payment Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.confirm-payment-email',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $booking = Booking::find($this->id_booking);
        $pdfInvoice = Pdf::loadView('print.invoice', ['booking' => $booking]);

        return [Attachment::fromData(fn () => $pdfInvoice->output(), 'Invoice.pdf')->withMime('application/pdf')];
    }
}
