<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tiket View</title>
    <style>
    
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
    
        body,
        html {
            color: black;
            font-size: 14px;
            letter-spacing: 0.1em;
        }
    
        .admit-one {
            background-image: url("http://web-travelgo.test/assets/img/jmtlogo2.png");
            width: 80px;
            transform: rotate(-180deg);
            background-size: cover;
        }
    
        .admit-one span:nth-child(2) {
            color: white;
            font-weight: 700;
        }
    
        .date {
            border-top: 1px solid gray;
            border-bottom: 1px solid gray;
            padding: 5px 0;
            font-weight: 500;
            text-align: center;
        }
    
        .date span {
            width: 100px;
        }
    
        .date span:first-child {
            text-align: left;
        }
    
        .date span:last-child {
            text-align: right;
        }
    
    
        .show-name {
            font-size: 16px;
            font-family: "Nanum Pen Script", cursive;
            color: gray;
            text-align: center;
            padding: 5px;
        }
    
    
        .show-name h1 {
            font-size: 48px;
            font-weight: 700;
            letter-spacing: 0.1em;
            color: #4a437e;
        }
    
        .time {
            color: #4a437e;
            text-align: center;
            display: flex;
            flex-direction: column;
            gap: 10px;
            font-weight: 700;
            padding-top: 5px;
        }
    
        .time span {
            font-weight: 400;
            color: gray;
        }
    
        .left .time {
            font-size: 16px;
        }
    
    
        .location {
            display: flex;
            justify-content: space-around;
            align-items: center;
            width: 100%;
            padding-top: 8px;
        }
    
        .location .separator {
            font-size: 20px;
        }

    
        .right .show-name h1 {
            font-size: 18px;
            align-items: center;
        }
    
    </style>
</head>
<body style="height: 100%;">
    <table style="width: 100%; height:100%; margin:0; border-collapse:collapse;">
        <tr>
            <td class="admit-one">

            </td>
            <td>
                <div>
                    <p class="date">
                        <span>{{$tiket->jadwal->trayek->nama_trayek}}</span>
                    </p>
                    <div class="show-name">
                        <p style="font-size: 12px;">
                            <span style="font-family:'Courier New', Courier, monospace">Tanggal</span>:
                            <span style="font-family:'Courier New', Courier, monospace; color:red">{{\Carbon\Carbon::parse($tiket->jadwal->tgl_keberangkatan)->format('d M Y')}}</span>
                        </p>
                    </div>
                    <div class="show-name">
                        <table style="margin: 10px; width:100%;">
                            <tr>
                                <td>Nama</td>
                                <td style="font-weight: bold">{{ \Str::title($booking->user->name)}}</td>
                            </tr>
                            <tr>
                                <td>Kelas</td>
                                <td style="font-weight: bold">{{$tiket->jadwal->jenis_kelas->namaKelas}}</td>
                            </tr>
                            <tr>
                                <td>Tujuan</td>
                                <td style="font-weight: bold">Bukittinggi</td>
                            </tr>

                            <tr>
                                <td>Driver</td>
                                <td style="font-weight: bold">{{$tiket->jadwal->supirs->nama_supir}}</td>
                            </tr>
                        </table>
                    </div>
                    <div style="margin-bottom: 10px;" class="time">
                        <p>Waktu Berangkat <span>@</span> {{\Carbon\Carbon::parse($tiket->jadwal->tgl_keberangkatan)->format('g:i A')}} <span style="padding-left: 35px;">
                                status : </span> @if ($booking->status == 2)
                                    Lunas @else Belum Lunas
                                @endif  </p>
                    </div>
                    <div style="border: 1px solid #222; font-size:10px; padding-left:10px; padding-bottom:10px;">
                        <p class="location" style="padding-top: 5px">
                            <span>www.Jasamulya.com</span>
                            <span class="separator">|</span>
                            <span>www.travelgo.com</span>
                        </p>
                        <p class="location">
                            <span>Mengutamakan Pelayanan Terbaik</span>
                        </p>
                    </div>
                </div>
            
            </td>
            <td style="background-color:darkorange; text-align:center; border-left: 2px dashed #404040;">
                        
                <div class="show-name">
                    <img height="30px" width="180px" src="http://web-travelgo.test/assets/img/fixtravelgo.png" alt="">
                </div>
                <div class="time">
                    <p>{{$tiket->jadwal->angkutan->nama_angkutan}} <span>:</span> {{$tiket->jadwal->angkutan->nomor_kendaraan}}</p>
                    <p>N0 Bangku :</p>
                </div>
                <div class="barcode" style="background-color: aliceblue; margin-top:10px; margin-bottom:10px;">
                    <h1
                        style="color: dimgrey; font-family:Arial, Helvetica, sans-serif; font-size: 50px;  font-weight: 700; text-align:center; ">
                        {{$tiket->detailBangku->kode_bangku}}
                    </h1>
                </div>
            </td>
        </tr>
    </table>
</body>
</html>
