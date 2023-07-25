<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class bookedEmail extends Mailable
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
        $temp['kota_keberangkatan'] = $booking->bookingDetail[0]->ticket->jadwal->trayek->areaAsal->kabupatenKota->nama_kab_kota;
        $temp['kota_tujuan'] = $booking->bookingDetail[0]->ticket->jadwal->trayek->areaTujuan->kabupatenKota->nama_kab_kota;
        $temp['tgl_keberangkatan'] = $booking->tgl_keberangkatan;
        $temp['driver'] = $booking->bookingDetail[0]->ticket->jadwal->supirs->nama_supir;
        $temp['nama_angkutan'] = $booking->bookingDetail[0]->ticket->jadwal->angkutan->nama_angkutan;
        $temp['total_harga'] = $booking->total_biaya;

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
        // $this->data = $data_baru;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Konfirmasi Reservasi Tiket',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {

        return new Content(
            view: 'email.booked-email',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
