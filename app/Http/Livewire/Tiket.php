<?php

namespace App\Http\Livewire;

use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\DetailBangku;
use App\Models\Ticket;
use Carbon\Carbon;
use Livewire\Component;

class Tiket extends Component
{
    public $id_jadwal;
    public $tikets;
    public $isManualEnabled = false;
    public $isEditEnabled = true;

    //variabel from tiket manual
    public $id_tiket;
    public $nama_penumpang;
    public $harga_tiket;
    public $nomor_hp_wa;
    public $penampaban_biaya;
    public $status;
    public $alamat;
    public $seat_number;
    public $alamat_penjemputan;
    public $alamat_pengantaran;
    public $id_booking;
    public $id_booking_detail;
    public $tiket_manual;

    protected $rules = [
        'status' => 'required',
        'nama_penumpang' => 'required',
        'harga_tiket' => 'required',
        'nomor_hp_wa' => 'required',
        'alamat_penjemputan' => 'required|min:10',
        'alamat_pengantaran' => 'required|min:10',
        'id_tiket' => 'required',
    ];

    public function render()
    {
        $this->tikets = Ticket::where('id_jadwal', $this->id_jadwal)->get();
        return view('livewire.tiket');
    }

    public function ubahStatusKetersediaanTitet($tiket)
    {
        $tiket_br = Ticket::where('id', $tiket['id'])->first();
        if ($tiket['status_tiket'] == 1) {
            $tiket_br->status_tiket = 0;
        } else {
            $tiket_br->status_tiket = 1;
        }
        $tiket_br->save();
    }

    public function isiTiketManual($tiket)
    {
        $this->harga_tiket = $tiket['harga_tiket'];
        $nomor_bangku = DetailBangku::find($tiket['id_seat']);
        $this->seat_number = $nomor_bangku->kode_bangku;
        $this->id_tiket = $tiket['id'];
        $this->isManualEnabled = true;
    }


    public function simpanPengisianTiketManual()
    {

        //tambahkan validasi
        $this->validate();

        //isikan booking
        $booking = Booking::updateOrCreate([
            'id' => $this->id_booking
        ], [
            'jumlah_tiket' => 1,
            'waktu_booking' => Carbon::now(),
            'id_customer' => 0,
            'titik_jemput' => null,
            'titik_antar' => null,
            'total_biaya' => $this->harga_tiket + $this->penampaban_biaya,
            'status' => $this->status,
        ]);

        BookingDetail::updateOrCreate([
            'id' => $this->id_booking_detail,
            'id_booking' => $booking->id,
        ], [
            'id_booking' => $booking->id,
            'nama_penumpang' => $this->nama_penumpang,
            'harga_tiket' => $this->harga_tiket,
            'penambahan_biaya' => $this->penampaban_biaya,
            'nomor_hp_wa' => $this->nomor_hp_wa,
            'alamat_penjemputan' => $this->alamat_penjemputan,
            'alamat_pengantaran' => $this->alamat_pengantaran,
            'id_tiket' => $this->id_tiket,
        ]);

        if ($this->status == 1) {
            $status_tiket = 2;
        } else if ($this->status == 2) {
            $status_tiket = 3;
        } else {
            $status_tiket = 1;
        }

        $tiket = Ticket::find($this->id_tiket);
        $tiket->status_tiket = $status_tiket;
        $tiket->save();

        $this->resetInput();
        $this->isManualEnabled = false;
        session()->flash('success', 'Berhasil menambahkan data booking');
    }


    public function resetInput()
    {
        $this->id_booking = 0;
        $this->id_booking_detail = 0;
        $this->harga_tiket = 0;
        $this->seat_number = 0;
        $this->id_tiket = 0;
        $this->nama_penumpang = 0;
        $this->harga_tiket = 0;
        $this->penampaban_biaya = 0;
        $this->nomor_hp_wa = 0;
        $this->alamat_penjemputan = 0;
        $this->alamat_pengantaran = 0;
        $this->id_tiket = 0;
    }

    public function comfirmBooking($id_booking)
    {
        $booking = Booking::find($id_booking);
        $booking->status = 2;
        $booking->save();

        $bookingDetail = BookingDetail::where('id_booking', $id_booking)->first();
        Ticket::where('id', $bookingDetail->id_tiket)->update([
            'status_tiket' => 3
        ]);

        session()->flash('success', 'Berhasil mengkomfirmasi pembookingan');
    }

    public function rejectBooking($id_booking)
    {
        BookingDetail::where('id_booking', $id_booking)->delete();
        $booking = Booking::find($id_booking);
        $booking->delete();

        session()->flash('success', 'Berhasil membatalkan pembookingan');
    }

    public function showEditBooking($bookingDetailData)
    {
        $bookingDetail = BookingDetail::find($bookingDetailData['id']);
        $this->id_booking = $bookingDetail->booking->id;
        $this->id_booking_detail = $bookingDetail->id;
        $this->harga_tiket = $bookingDetail->harga_tiket;
        $this->seat_number = $bookingDetail->ticket->detailBangku->kode_bangku;
        $this->id_tiket = $bookingDetail->ticket->id;
        $this->nama_penumpang = $bookingDetail->nama_penumpang;
        $this->penampaban_biaya = $bookingDetail->penambahan_biaya;
        $this->nomor_hp_wa = $bookingDetail->no_hp_wa;
        $this->alamat_penjemputan = $bookingDetail->alamat_penjemputan;
        $this->alamat_pengantaran = $bookingDetail->alamat_pengantaran;
        $this->status = $bookingDetail->booking->status;

        if ($this->status == 2) {
            $this->isEditEnabled = false;
        }

        $this->isManualEnabled = true;
    }

    public function keluarFormManual()
    {
        $this->isManualEnabled = false;
    }
}
