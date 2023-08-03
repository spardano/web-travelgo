<?php

namespace App\Http\Livewire;

use App\Models\Bangku;
use App\Models\Jadwal;
use Livewire\Component;

class FormBooking extends Component
{
    public $id_jadwal = 22;
    public $bangku;
    public $maxColumnLayout;
    public $jadwal;

    public function render()
    {
        $this->jadwal = Jadwal::find($this->id_jadwal);
        $id_jadwal = $this->id_jadwal;

        $this->bangku = Bangku::with(['detail_bangku' => function ($query) use ($id_jadwal) {
            $query->with(['tiket' => function ($q) use ($id_jadwal) {
                $q->where('id_jadwal', $id_jadwal);
            }]);
            $query->orderBy('baris');
            $query->orderBy('kolom');
        }])->where('id_angkutan', $this->jadwal->id_angkutan)->first();

        // var_dump($this->bangku);

        $this->maxColumnLayout = 12 / $this->bangku->jumlah_kolom;

        return view('livewire.form-booking');
    }
}
