<?php

namespace App\Http\Livewire;

use App\Mail\bookedEmail;
use App\Models\Bangku;
use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\Jadwal;
use App\Models\PaymentTransactions;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Illuminate\Support\Str;

class FormBooking extends Component
{

    protected $listeners = ['storeBooking', 'setJadwaId', 'resetContent', 'getBangku'];

    public $id_jadwal;
    public $maxColumnLayout;
    public $jadwal;
    public $selectedSeat = [];
    public $paymentMethod = "online";
    public $biayaAdmin = 6500;
    public $totalTagihan;
    public String $paymentNumber;
    public $isOpenPayment = false;
    public $isAuthenticated = false;

    public function render()
    {

        $isTokenAvailabel = session('access_token');

        $this->getBangku();

        if ($isTokenAvailabel) {
            $this->isAuthenticated = true;
        }

        return view('livewire.form-booking');
    }

    public function setJadwaId($id_jadwal)
    {
        $this->id_jadwal = $id_jadwal;
    }

    public function getBangku()
    {
        $this->jadwal = Jadwal::with(['angkutan.detail_bangku' => function ($query) {
            $query->with('tiket', function ($query) {
                $query->where('id_jadwal', $this->id_jadwal);
            })->orderBy('baris')->orderBy('kolom');
        }, 'angkutan.bangku'])->find($this->id_jadwal);

        if ($this->jadwal) {
            $this->maxColumnLayout = 12 / $this->jadwal->angkutan->bangku->jumlah_kolom;
        }
    }

    public function resetContent()
    {
        $this->jadwal = null;
        $this->maxColumnLayout = 0;
    }

    public function selectSeat($item)
    {

        if ($this->checkIfDataAlreadySelected($item['id'])) {
            $this->removeSelectedSeat($item['kode_bangku']);
        } else {
            array_push($this->selectedSeat, $item);
        }

        $this->hitungTagihan();
    }


    public function  checkIfDataAlreadySelected($id)
    {
        foreach ($this->selectedSeat as $item) {
            if ($item['id'] == $id) {
                return true;
            }
        }

        return false;
    }


    public function removeSelectedSeat($kode_bangku)
    {
        foreach ($this->selectedSeat as $key => $element) {
            if ($kode_bangku ==  $element['kode_bangku']) {
                unset($this->selectedSeat[$key]);
            }
        }
    }

    public function hitungTagihan()
    {

        $totalTiket = 0;
        foreach ($this->selectedSeat as $item) {
            $totalTiket = $totalTiket + $item['tiket']['harga_tiket'];
        }

        $biaya_admin = 0;
        if ($this->paymentMethod == 'online') {
            $biaya_admin = 6500;
        } else {
            $biaya_admin = 0;
        }

        $this->totalTagihan = $totalTiket  + $biaya_admin;
    }


    public function storeBooking()
    {
        //titik jemput
        $titik_jemput['lat'] = '';
        $titik_jemput['lng'] = '';
        $titik_jemput['kab_kota'] = $this->jadwal->trayek->areaAsal->kabupatenKota->nama_kab_kota;

        //titik antar
        $titik_antar['lat'] = '';
        $titik_antar['lng'] = '';
        $titik_antar['kab_kota'] = $this->jadwal->trayek->areaTujuan->kabupatenKota->nama_kab_kota;

        $booking = Booking::create([
            'jumlah_tiket' => count($this->selectedSeat),
            'waktu_booking' => Carbon::now(),
            'id_customer' => 2,
            'total_biaya' => $this->totalTagihan,
            'titik_jemput' => json_encode($titik_jemput),
            'titik_antar' => json_encode($titik_antar),
            'tk_biaya' => 0,
            'status' => 1
        ]);

        if ($booking) {
            foreach ($this->selectedSeat as $item) {

                $detail_booking = BookingDetail::create([
                    'id_booking' => $booking->id,
                    'id_tiket' => $item['tiket']['id'],
                    'nama_penumpang' => 'Sakti Pardano',
                    'nomor_hp_wa' => '0895618958338',
                    'harga_tiket' => $item['tiket']['harga_tiket'],
                ]);

                $tiket = Ticket::where('id', $item['tiket']['id'])->first();
                $tiket->status_tiket = 2;
                $tiket->save();
            }

            $payment = PaymentTransactions::create([
                'number' => Str::orderedUuid(),
                'id_booking' => $booking->id,
                'id_customer' => 2,
                'gross_amount' => $booking->total_biaya,
                'payment_status' => 1,
            ]);

            $this->paymentNumber = $payment->number;
            $this->isOpenPayment = true;

            //send email;
            Mail::to('sakti.pardano29@gmail.com')->send(new bookedEmail($booking->id));
        }
    }
}
