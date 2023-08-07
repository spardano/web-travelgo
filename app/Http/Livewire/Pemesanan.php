<?php

namespace App\Http\Livewire;

use App\Models\PaymentTransactions;
use Exception;
use GuzzleHttp\Client;
use Livewire\Component;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Pemesanan extends Component
{
    public $data_pemesanan;
    public function render()
    {
        $this->getDataPemesanan();
        return view('livewire.pemesanan');
    }

    public function getDataPemesanan()
    {
        $token = session('access_token');
        $id_user = session('id_cus');
        $client = new Client();
        if ($token) {
            try {

                $response = $client->request('POST', url('api/pemesanan/get-booking'), [
                    'form_params' => [
                        'id' => $id_user,
                    ],
                    'headers' => [
                        'Authorization' => $token,
                    ],
                ]);

                $res = json_decode($response->getBody());

                if ($res->status) {
                    $this->data_pemesanan = $res->data;
                }
            } catch (Exception $e) {
                dd($e->getMessage());
                throw new HttpException(500, $e->getMessage());
            }
        }
    }

    public function bayarBooking($id_booking)
    {
        $payment = PaymentTransactions::where('id_booking', $id_booking)->first();
        redirect()->to('payment/' . $payment->number);
    }
}
