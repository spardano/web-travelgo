<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\bookedEmail;
use App\Models\Bangku;
use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\Jadwal;
use App\Models\PaymentTransactions;
use App\Models\Ticket;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PemesananController extends Controller
{

    protected $client;
    public function __construct()
    {
        //construct
        $this->client = new Client();
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('app.midtrans_server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
    }

    public function jadwal(Request $request)
    {

        // return $request;
        if ($request->filter) {
            $data = Jadwal::with(['angkutan', 'trayek', 'jenis_kelas'])->whereHas('trayek', function ($query) use ($request) {
                $query->when($request->filter['s_area_keberangkatan'] != null, function ($q) use ($request) {
                    $q->where('id_area_asal', '=', $request->filter['s_area_keberangkatan']);
                })->when($request->filter['s_area_tujuan'] != null, function ($q) use ($request) {
                    $q->where('id_area_tujuan', '=', $request->filter['s_area_tujuan']);
                });
            })->where('tgl_keberangkatan', '>=', Carbon::now())->when($request->filter['s_tgl_keberangkatan'] != null, function ($query) use ($request) {
                $query->where('tgl_keberangkatan', 'LIKE', $request->filter['s_tgl_keberangkatan'] . '%');
            })->get();
        } else {
            $data = Jadwal::with(['angkutan', 'trayek', 'jenis_kelas'])->where('tgl_keberangkatan', '>=', Carbon::now())->get();
        }

        $data_baru = array();
        $multiplied = $data->map(function ($item) {

            $wkt = explode(" ", $item->tgl_keberangkatan);
            $tiket_tersedia = Ticket::where('id_jadwal', $item->id)->where('status_tiket', '!=', 3)->count();

            $media = $item->angkutan->getMedia('foto_kendaraan')->where('model_id', $item->angkutan->id)->first();

            $temp['id_jadwal'] = $item->id;
            $temp['nama_angkutan'] = $item->angkutan->nama_angkutan;
            $temp['nama_kelas'] = $item->jenis_kelas->namaKelas;
            $temp['harga'] = $item->trayek->harga_basis + $item->jenis_kelas->penambahanBiaya;
            $temp['nama_trayek'] = $item->trayek->nama_trayek;
            $temp['kota_keberangkatan'] = $item->trayek->areaAsal->kabupatenKota->nama_kab_kota;
            $temp['kota_tujuan'] =  $item->trayek->areaTujuan->kabupatenKota->nama_kab_kota;
            $temp['thumbnail'] = $media->getUrl();
            $temp['tanggal_berangkat'] = $wkt[0];
            $temp['waktu_berangkat'] = $wkt[1];
            $temp['tiket_tersedia'] = $tiket_tersedia;
            return $temp;
        });

        $data_baru = $multiplied->all();

        if ($data_baru) {
            return response()->json([
                'status' => true,
                'data' => $data_baru
            ]);
        }

        return response()->json([
            'status' => false,
            "message" => 'data tidak ditemukan'
        ]);
    }

    public function getBangku(Request $request)
    {

        $id_jadwal = $request->id_jadwal;

        $jadwal = Jadwal::find($id_jadwal);

        $bangku = Bangku::with(['detail_bangku' => function ($query) use ($id_jadwal) {
            $query->with(['tiket' => function ($q) use ($id_jadwal) {
                $q->where('id_jadwal', $id_jadwal);
            }]);
            $query->orderBy('baris');
            $query->orderBy('kolom');
        }])->where('id_angkutan', $jadwal->id_angkutan)->first();

        if (!$bangku) {
            return response()->json([
                'status' => false,
                'message' => 'Data bangku tidak ditemukan'
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $bangku
        ]);
    }

    public function getBooking(Request $request)
    {

        $listbooking = Booking::with(['bookingDetail.ticket.detailBangku', 'paymentTransaction'])->where('id_customer', $request->id)->orderBy('created_at', 'desc')->get();

        $multiplied = $listbooking->map(function ($item) {

            $bookingDetail = BookingDetail::with('ticket.jadwal.trayek')->where('id', $item->bookingDetail[0]->id)->first();

            $jadwal = Jadwal::find($bookingDetail->ticket->jadwal['id']);
            $media = $jadwal->angkutan->getMedia('foto_kendaraan')->where('model_id', $jadwal->angkutan->id)->first();



            $wkt = explode(" ", $bookingDetail->ticket->jadwal->tgl_keberangkatan);
            $temp['nama_trayek'] = $bookingDetail->ticket->jadwal->trayek ? $bookingDetail->ticket->jadwal->trayek->nama_trayek : null;
            $temp['id_booking'] = $item->id;
            $temp['jml_tiket'] = $item->jumlah_tiket;
            $temp['harga_tiket'] = $bookingDetail->ticket->harga_tiket;
            $temp['penambahan_biaya'] = $bookingDetail->penambahan_biaya;
            $temp['total_biaya'] = $item->total_biaya;
            $temp['waktu_booking'] = $item->waktu_booking;
            $temp['tanggal_berangkat'] = $wkt[0];
            $temp['waktu_berangkat'] = $wkt[1];
            $temp['status'] = $item->status;
            $temp['thumbnail'] = $media->getUrl();
            $temp['tiket'] = $temp;
            $temp['payment_number'] = $item->paymentTransaction->number;

            return $temp;
        });

        $data_baru = $multiplied->all();

        if ($data_baru) {
            return response()->json([
                'status' => true,
                'data' => $data_baru,
            ]);
        }
    }

    public function getBookingdetail(Request $request)
    {
        return $boking_detail = Booking::with(['bookingDetail.ticket.jadwal.trayek', 'bookingDetail.ticket.detailBangku'])->where('id', $request->id_booking)->first();
    }

    public function storeBooking(Request $request)
    {

        //titik jemput
        $titik_jemput['lat'] = $request->detail_booking['area_jemput']['lat'];
        $titik_jemput['lng'] = $request->detail_booking['area_jemput']['lng'];
        $titik_jemput['kab_kota'] = $request->detail_booking['area_jemput']['data']['kab_kota'];

        //titik antar
        $titik_antar['lat'] = $request->detail_booking['area_antar']['lat'];
        $titik_antar['lng'] = $request->detail_booking['area_antar']['lng'];
        $titik_antar['kab_kota'] = $request->detail_booking['area_antar']['data']['kab_kota'];


        $booking = Booking::create([
            'jumlah_tiket' => count($request->detail_booking['selected_seat']),
            'waktu_booking' => Carbon::now(),
            'id_customer' => $request->user['id'],
            'total_biaya' => $request->total_harga,
            'titik_jemput' => json_encode($titik_jemput),
            'titik_antar' => json_encode($titik_antar),
            'tk_biaya' => $request->tk_biaya,
            'status' => 1
        ]);

        if ($booking) {
            foreach ($request->detail_booking['selected_seat'] as $item) {

                $detail_booking = BookingDetail::create([
                    'id_booking' => $booking->id,
                    'id_tiket' => $item['tiket']['id'],
                    'nama_penumpang' => $request->user['name'],
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
                'id_customer' => $request->user['id'],
                'gross_amount' => $booking->total_biaya,
                'payment_status' => 1,
            ]);

            //send email;
            Mail::to($request->user['email'])->send(new bookedEmail($booking->id));
        }

        return response()->json([
            'status' => true,
            'payment_number' => $payment->number,
            'id_booking' => $booking->id,
            'message' => 'Berhasil Menyimpan data Booking',
        ]);
    }

    public function refundCencel(Request $request)
    {
        if ($request) {
            Booking::where('id', $request->id_booking)->update([
                'status' => 4
            ]);

            return response()->json([
                'status' => true,
                'message' => "Bookingan dibatalkan"
            ]);
        }
    }

    public function requestPayment(Request $request)
    {

        $booking = Booking::with(['bookingDetail', 'user'])->where('id', $request->id_booking)->first();

        $name = explode(' ', $request->user['name']);

        $item_order = [
            array(
                'id' => $booking->id,
                'price' => $booking->total_biaya,
                'quantity' => 1,
                'name' => $booking->user->name
            )
        ];

        $transaction_details =  array(
            'order_id' => $request->id_booking,
            'gross_amount' => $booking->total_biaya
        );

        $customer_details = array(
            'first_name' => $name[0],
            'last_name' => $name[1] ? $name[1] : null,
            'email' => $request->user['email'],
            'phone' => "082283445039",
        );

        $payload = array(
            'transaction_details' => $transaction_details,
            'item_details' => $item_order,
            'customer_details' => $customer_details
        );

        try {

            // Get Snap Payment Page URL
            $paymentUrl = \Midtrans\Snap::createTransaction($payload)->redirect_url;

            if ($paymentUrl) {
                return response()->json([
                    'status' => true,
                    'paymentUrl' => $paymentUrl,
                ]);
            }

            return response()->json([
                'api_status' => false,
                'api_message' => 'Gagal melakukan request payment',
            ]);
        } catch (RequestException $e) {

            if ($e->getResponse()->getStatusCode() == 403) {
                return $this->requestPayment($request);
            } else {
                return response()->json([
                    "status" => false,
                    "message" => $e
                ]);
            }
        }
    }


    public function checkStatusPayment(Request $request)
    {
        $status = \Midtrans\Transaction::status($request->payment_number);
        if ($status) {
            return response()->json([
                'status' => true,
                'data' => $status
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Gagal mendapatkan status'
            ]);
        }
    }
}
