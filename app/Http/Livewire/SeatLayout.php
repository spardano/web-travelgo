<?php

namespace App\Http\Livewire;

use App\Models\Bangku;
use App\Models\DetailBangku;
use Livewire\Component;

class SeatLayout extends Component
{

    protected $listeners = ['storeBangku', 'hapusBangku'];

    public $id_angkutan;
    public $numRows = 1;
    public $numColumns = 1;
    public $displayMap = false;
    public $displayAddSeat = false;

    //data
    public $bangku;

    //var
    public $id_detail_bangku;
    public $baris;
    public $kolom;
    public $seat_code;
    public $availability;

    public function render()
    {
        return view('livewire.seat-layout');
    }

    public function generateSeatMap()
    {

        Bangku::updateOrCreate([
            'id_angkutan' => $this->id_angkutan
        ], [
            'jumlah_baris' => $this->numRows,
            'jumlah_kolom' => $this->numColumns
        ]);

        $this->displayMap = true;
    }

    public function addBangku($baris, $kolom)
    {
        $this->baris = $baris;
        $this->kolom = $kolom;
        $this->displayAddSeat = true;
    }

    public function storeBangku()
    {
        DetailBangku::updateOrCreate([
            'id' => $this->id_detail_bangku,
        ], [
            'id_angkutan' => $this->id_angkutan,
            'baris' => $this->baris,
            'kolom' => $this->kolom,
            'kode_bangku' => $this->seat_code,
            'ketersediaan' => $this->availability
        ]);

        $this->bangku = Bangku::where('id_angkutan', $this->id_angkutan)->first();
        $this->resetInput();
        session()->flash('success', 'Berhasil menambahkan bangku');
    }

    public function resetInput()
    {
        $this->baris = 0;
        $this->kolom = 0;
        $this->seat_code = null;
        $this->availability = 0;

        $this->displayAddSeat = false;
    }

    public function mount($id_angkutan)
    {
        $this->id_angkutan = $id_angkutan;
        $this->bangku = Bangku::where('id_angkutan', $this->id_angkutan)->first();

        if ($this->bangku) {
            $this->id_detail_bangku = $this->id_detail_bangku;
            $this->numColumns = $this->bangku->jumlah_kolom;
            $this->numRows = $this->bangku->jumlah_baris;
            $this->displayMap = true;
        }
    }

    public function hapusBangku($id_detail_bangku)
    {
        DetailBangku::find($id_detail_bangku)->delete();
        $this->bangku = Bangku::where('id_angkutan', $this->id_angkutan)->first();
        session()->flash('success', 'Berhasil menghapus bangku');
    }
}
