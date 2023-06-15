<?php

namespace App\Http\Livewire;

use App\Models\DetailBangku;
use App\Models\Ticket;
use Livewire\Component;

class Tiket extends Component
{
    public $id_jadwal;
    public $tikets;
    public $isManualEnabled = false;

    //variabel from tiket manual
    public $nama_penumpang;
    public $harga_tiket;
    public $nomor_hp;
    public $penampaban_biaya;
    public $status;
    public $alamat;
    public $seat_number;

    public $tiket_manual;

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
        $this->isManualEnabled = true;
    }
}
