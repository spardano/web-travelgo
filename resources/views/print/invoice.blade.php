<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice Pembayaran</title>
    <link rel="stylesheet" href="{{public_path('assets/css/invoice.css')}}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lato:wght@100;400;900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Lato', sans-serif;
        }

        body {
            color: #3d3d3d;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
        }

        .bold {
            font-weight: 900;
        }

        .light {
            font-weight: 100;
        }

        .wrapper {
            background: #fff;
            padding: 30px;
        }

        .invoice_wrapper {
            border: 3px solid #0000ff;
            width: 700px;
            max-width: 100%;
        }

        .invoice_wrapper .header .logo_sec {
            display: flex;
            align-items: center;
        }

        .invoice_wrapper .header .logo_sec .title_wrap {
            margin-left: 5px;
        }

        .invoice_wrapper .header .logo_sec .title_wrap .title {
            text-transform: uppercase;
            font-size: 18px;
            color: #0000ff;
        }

        .invoice_wrapper .header .logo_sec .title_wrap .sub_title {
            font-size: 12px;
        }

        .invoice_wrapper .header .invoice_sec,
        .invoice_wrapper .header .bill_total_wrap .total_wrap {
            text-align: right;
        }

        .invoice_wrapper .header .invoice_sec .invoice {
            font-size: 28px;
            color: #0000ff;
        }

        .invoice_wrapper .header .invoice_sec .invoice_no,
        .invoice_wrapper .header .invoice_sec .date {
            display: flex;
            width: 100%;
        }

        .invoice_wrapper .header .invoice_sec .invoice_no span:first-child,
        .invoice_wrapper .header .invoice_sec .date span:first-child {
            width: 70px;
            text-align: left;
        }

        .invoice_wrapper .header .invoice_sec .invoice_no span:last-child,
        .invoice_wrapper .header .invoice_sec .date span:last-child {
            width: calc(100% - 70px);
        }

         .price,
         .bill_sec .name {
            color: #0000ff;
            font-size: 20px;
        }

        .invoice_wrapper .body .main_table .table_header {
            background: #0000ff;
        }

        .invoice_wrapper .body .main_table .table_header .row {
            color: #fff;
            font-size: 18px;
            border-bottom: 0px;
        }

        .invoice_wrapper .body .main_table .row {
            display: flex;
            border-bottom: 1px solid #3d3d3d;
        }

        .invoice_wrapper .body .main_table .row .col {
            padding: 10px;
        }

        .invoice_wrapper .body .main_table .row .col_no {
            width: 5%;
        }

        .invoice_wrapper .body .main_table .row .col_des {
            width: 45%;
        }

        .invoice_wrapper .body .main_table .row .col_price {
            width: 20%;
            text-align: center;
        }

        .invoice_wrapper .body .main_table .row .col_qty {
            width: 10%;
            text-align: center;
        }

        .invoice_wrapper .body .main_table .row .col_total {
            width: 20%;
            text-align: right;
        }

        .paymethod_sec {
            padding-left: 30px;
        }

        .grandtotal_sec p {
            display: flex;
            width: 100%;
            padding-bottom: 5px;
        }

        .grandtotal_sec p span {
            padding: 0 10px;
        }

        .grandtotal_sec p span:first-child {
            width: 60%;
        }

        .grandtotal_sec p span:last-child {
            width: 40%;
            text-align: right;
        }

        .grandtotal_sec p:last-child span {
            background: #0000ff;
            padding: 10px;
            color: #fff;
        }

        .invoice_wrapper .footer {
            padding: 30px;
        }

        .invoice_wrapper .footer>p {
            color: #0000ff;
            text-decoration: underline;
            font-size: 18px;
            padding-bottom: 5px;
        }

        .invoice_wrapper .footer .terms .tc {
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="invoice_wrapper">
            <div class="header">

                <table style="width: 100%">

                    <tr>
                        <td>
                            <img src="{{ asset('assets\img\fixtravelgo.png') }}" width="250px;" height="50px;">
                        </td>
                        <td style="text-align: right;">
                            <img src="{{ asset('assets\img\logojmt2.png') }}" width="80px;" height="100px;">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="bill_sec" style="padding-left: 20px">
                                <p>INVOICE</p>
                                <p class="bold name">{{ \Str::title($booking->user->name)}}</p>
                                <span>
                                    {{$booking->user->email}}
                                </span>
                            </div>
                        </td>
                        <td style="text-align: right; padding-right:20px;">
                            <div class="total_wrap">
                                <p class="bold price">{{\Carbon\Carbon::parse($booking->waktu_booking)->format('d M Y')}}</p>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="body" style="margin-top:40px;">
                <table style="width:100%; border-collapse:collapse;">
                    <tr style="background: #0000ff; color:white; text-align:center;">
                        <td>NO.</td>
                        <td>KATEGORI</td>
                        <td>BIAYA</td>
                        <td>JUMLAH</td>
                        <td>TOTAL</td>
                    </tr>

                    @php
                        $no = 0;
                        $penambahan_biaya = 0;
                    @endphp
                    {{-- Produk Tiket --}}
                    @foreach ($booking->bookingDetail as $index => $item)
                    <tr style="text-align:center;">
                        <td style="border-bottom: 1px solid gray;">
                            <p>{{ $no = $index+1}}</p>
                        </td>
                        <td style="border-bottom: 1px solid gray;">
                            <p class="bold">Tiket</p>
                            <p>{{$item->ticket->detailBangku->kode_bangku}}</p>
                        </td>
                        <td style="border-bottom: 1px solid gray;">
                            <p>Rp. {{ number_format($item->harga_tiket)}}</p>
                        </td>
                        <td style="border-bottom: 1px solid gray;">
                            <p>1</p>
                        </td>
                        <td style="border-bottom: 1px solid gray;">
                            <p>Rp. {{ number_format($item->harga_tiket)}}</p>
                        </td>
                    </tr>

                    @php
                        $penambahan_biaya = $penambahan_biaya + $item->penambahan_biaya;
                    @endphp

                    @endforeach

                    {{-- Penambahan Biaya --}}
                    @if ($penambahan_biaya != 0)
                        <tr style="text-align:center;">
                            <td style="border-bottom: 1px solid gray;">
                                <p>{{$no+1}}</p>
                            </td>
                            <td style="border-bottom: 1px solid gray;">
                                <p class="bold">Penambahan Biaya</p>
                            </td>
                            <td style="border-bottom: 1px solid gray;">
                                <p>Rp. {{ number_format(6500)}}</p>
                            </td>
                            <td style="border-bottom: 1px solid gray;">
                                {{-- <p>1</p> --}}
                            </td>
                            <td style="border-bottom: 1px solid gray;">
                                <p>Rp. {{ number_format(6500)}}</p>
                            </td>
                        </tr>
                    @endif

                    {{-- biaya admin --}}
                    @if ($booking->paymentTransaction->snap_token != null)
                        <tr style="text-align:center;">
                            <td style="border-bottom: 1px solid gray;">
                                <p>{{$no+1}}</p>
                            </td>
                            <td style="border-bottom: 1px solid gray;">
                                <p class="bold">Biaya Admin</p>
                            </td>
                            <td style="border-bottom: 1px solid gray;">
                                <p>Rp. {{ number_format(6500)}}</p>
                            </td>
                            <td style="border-bottom: 1px solid gray;">
                                {{-- <p>1</p> --}}
                            </td>
                            <td style="border-bottom: 1px solid gray;">
                                <p>Rp. {{ number_format(6500)}}</p>
                            </td>
                        </tr>
                    @endif


                    {{-- biaya admin --}}
                    @if ($booking->tk_biaya != null)
                        <tr style="text-align:center;">
                            <td style="border-bottom: 1px solid gray;">
                                <p>{{$no+1}}</p>
                            </td>
                            <td style="border-bottom: 1px solid gray;">
                                <p class="bold">Pengurangan Biaya</p>
                            </td>
                            <td style="border-bottom: 1px solid gray;">
                                <p>Rp. {{ number_format($booking->tk_biaya)}}</p>
                            </td>
                            <td style="border-bottom: 1px solid gray;">
                                {{-- <p>1</p> --}}
                            </td>
                            <td style="border-bottom: 1px solid gray;">
                                <p>Rp. {{ number_format($booking->tk_biaya)}}</p>
                            </td>
                        </tr>
                    @endif

                </table>

                <table style="width: 100%">
                    <tr>
                        <td>
                            <div class="paymethod_sec">
                                <p class="bold">Payment Method</p>

                                @if ($booking->paymentTransaction->snap_token != null)
                                    <p>Midtrans Payment Gateway</p>
                                @else
                                    <p>Pembayaran Lansung</p>
                                @endif
                            </div>
                        </td>
                        <td style="text-align: right; padding:20px;">
                            <div class="grandtotal_sec">
                                <p class="bold">
                                    <span>Total Bayar</span>
                                    <span>Rp. {{number_format($booking->total_biaya)}}</span>
                                </p>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="footer">
                <p style="color: red">Perhatian!!!</p>
                <div class="terms">
                    <p>*Pembatalan tiket minimal 1 hari sebelum keberangkatan, potongan 25% dari total bayar</p>
                    <p>*Pembatalan tiket pada hari keberangkatan uang tidak kembali</p>
                    <p>*Antar jemput hanya untuk dalam kota, max 5 km dari pusat kota</p>
                    <p>*Dilarang membawa binatang, buah-buahan yang berbahaya</p>
                    <p>*Dilarang membawa barang yang dilarang oleh undang-undang (narkotika)</p>
                    <p>*Kami menerima kritik dan saran</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

