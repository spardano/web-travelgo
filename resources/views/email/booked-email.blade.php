<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Booking Perjalanan</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/29d92540e5.js" crossorigin="anonymous"></script> --}}

</head>
<body style="background-color: rgba(248,249,250, 0.936) !important;" class="bg-light">
    <div style="text-align: center; margin-top:20px; margin-bottom:40px;" class="container text-center">
      <img class="my-4" style="width: 140px; margin-bottom:30px;" src="{{asset('assets/img/logo-travel-go.png')}}" />
      
      <div class="card" style="width: 40rem; margin:0 auto; background:white; border-radius:20px; text-align:left;">
        
        <ul style="padding: 0" class="list-group list-group-flush">
            <li style="position: relative;
            padding:20px;
            display: block; 
            text-decoration: none; 
            border-bottom:1px solid #dee2e6;
            border-top-left-radius: inherit;
            border-top-right-radius: inherit;" class="list-group-item">
                <div class="text-start mb-4 mt-4">
                    <h5 style="font-weight: 700 !important; 
                    font-size: 1.25rem;
                    line-height: 1.2;
                    margin-top:0;" class="card-title fw-bold">Yth, {{ \Str::title($data['nama_customer'])}}.</h5>
                    <p class="card-text">Reservasi tiket perjalanan kamu sudah kami terima. Berikut detail pemesanan dan detail biaya yang harus dibayarkan:</p>
                </div>
            </li>
            <li style="position: relative;
            display: block; 
            padding:20px;
            border-bottom:1px solid #dee2e6;
            text-decoration: none;" class="list-group-item">
                <div class="text-start">

                    <div style="margin-top: 20px; margin-bottom:20px;" class="my-2">
                        <label for="">Nama Penumpang</label>
                        <p style="font-size: 25px; color:green;" class="text-primary fs-5">{{ \Str::title($data['nama_customer'])}}</p>
                    </div>

                    <div style="margin-top: 20px; margin-bottom:20px;" class="my-2">
                        <label for="">Email</label>
                        <p>{{$data['email']}}</p>
                    </div>

                    <div style="margin-top: 20px; margin-bottom:20px;" class="my-2">
                        <table style="width: 100%">
                            <tr>
                                <td>
                                    <label>Berangkat</label>
                                    <p style="font-weight: bold" class="fw-bold">{{$data['kota_keberangkatan']}}</p>
                                </td>
                                <td>
                                    <label>Tujuan</label>
                                    <p style="font-weight: bold" class="fw-bold">{{$data['kota_tujuan']}}</p>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label>Angkutan</label>
                                    <p style="font-weight: bold" class="fw-bold">{{$data['nama_angkutan']}}</p>
                                </td>
                                <td>
                                    <label>Driver</label>
                                    <p style="font-weight: bold" class="fw-bold">{{$data['driver']}}</p>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label>Tanggal Keberangkatan</label>
                                </td>
                                <td>
                                    <p style="font-weight: bold" class="fw-bold">{{\Carbon\Carbon::parse($data['tgl_keberangkatan'])->format('d M Y')}}</p>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label>Waktu Keberangkatan</label>
                                </td>
                                <td>
                                    <p style="font-weight: bold" class="fw-bold">{{\Carbon\Carbon::parse($data['tgl_keberangkatan'])->format('g:i A')}}</p>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label>Jumlah Tiket</label>
                                </td>
                                <td>
                                    <p style="font-weight: bold" class="fw-bold">{{count($data['tiket'])}} Tiket</p>
                                </td>
                            </tr>

                        </table>
                    </div>

                </div>
            </li>

            <li style="position: relative;
            display: block; 
            padding:20px;
            text-decoration: none;" class="list-group-item">
                <table style="margin: 40px auto;
                text-align: left;
                width: 80%;" class="invoice">
                    <tbody><tr>
                        <td>
                            @if ($data['biaya_admin'] == null)
                                Bayar Lansung
                            @else
                                Midtrans
                            @endif
                            
                        <br>Rincian Biaya</td>
                    </tr>
                    <tr>
                        <td style="padding: 5px 0;">
                            <table style="width: 100%;" class="invoice-items" cellpadding="0" cellspacing="0">
                                <tbody>
                                
                                @foreach ($data['tiket'] as $item)    
                                <tr>
                                    <td style="border-top: #eee 1px solid;">Tiket {{$item['kode_bangku']}}</td>
                                    <td style="border-top: #eee 1px solid;" class="alignright">Rp. {{number_format($item['harga_tiket'])}}</td>
                                </tr>
                                @endforeach
                                
                                @if ($data['biaya_admin'])    
                                <tr>
                                    <td style="border-top: #eee 1px solid;">Biaya Admin</td>
                                    <td style="border-top: #eee 1px solid;" class="alignright">Rp {{ number_format($data['biaya_admin']) }}</td>
                                </tr>
                                @endif

                                @if ($data['tk_biaya'])    
                                    <tr>
                                        @if ($data['tk_biaya'] > 0)
                                            <td style="border-top: #eee 1px solid;">Penambahan Biaya Tiket</td>
                                        @else
                                            <td style="border-top: #eee 1px solid;">Pengurangan Biaya Tiket</td>
                                        @endif
                                        <td style="border-top: #eee 1px solid;" class="alignright">Rp {{ number_format($data['tk_biaya']) }}</td>
                                    </tr>
                                @endif

                                <tr class="total">
                                    <td style="border-top: 2px solid #333;
            border-bottom: 2px solid #333;
            font-weight: 700;" class="alignright" width="80%">Total</td>
                                    <td style="border-top: 2px solid #333;
            border-bottom: 2px solid #333;
            font-weight: 700;" class="alignright text-success">Rp. {{ number_format($data['total_harga']) }}</td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                </tbody></table>
            </li>

        </ul>

        <div style="padding:20px; 
        border-top:1px solid #dee2e6;" class="card-footer text-start">
            www.web-travelgo.com <br>
            <i class="fa-brands fa-whatsapp text-success"></i> +62 822 8983 2837 <br>
            <i class="fa-brands fa-facebook text-primary"></i> Jasa Mulya Travel
        </div>

      </div>
      
      {{-- <img class="ax-center mt-4" width="10%" src="https://assets.bootstrapemail.com/logos/light/text.png" /> --}}
      <div class="text-muted text-center mt-4" style="margin-top:40px; ">
        Email ini diperuntukkan hanya untuk John Doe karena telah melakukan reservasi tiket perjalanan melalui Travelgo
      </div>
    </div>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script> --}}

  </body>
  
</html>