<div>
    <div class="row">
        <div class="col-md-6">
            <h4>Pilih Bangku</h4>

            <div class="card">
                <div class="card-body">

                    <div class="row">
                        @foreach ($bangku->detail_bangku as $item)    
                            <div class="col-sm-{{$maxColumnLayout}} mt-2">
                                <div class="card {{ $item->tiket ?  '' : 'text-bg-danger'  }} ">
                                    <div class="card-body text-center">
                                        @if ($item->tiket && $item->tiket->status_tiket != 3)
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        @else
                                            <label class="text-danger">Terjual</label>
                                        @endif
                                      <h5>{{$item->kode_bangku}}</h5>
                                    </div>
                                </div>  
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>

            
        </div>

        <div class="col-md-6">
            <h4>Keterangan Pemesanan</h4>

            <div class="card">
                <div class="card-body">

                    <h5>{{ $jadwal->trayek->nama_trayek }}</h5>

                    @php
                        // Menggunakan Carbon untuk memanipulasi tanggal_berangkat
                        $tanggalBerangkat = \Illuminate\Support\Carbon::parse($jadwal->tgl_keberangkatan)->format('d M Y');
                        $waktuBerangkat = \Illuminate\Support\Carbon::parse($jadwal->tgl_keberangkatan)->format('g:i A');
                    @endphp

                    <table width="100%">
                        <tr>
                            <td>Tanggal Berangkat</td>
                            <td style="font-weight: bold; text-align:right;">{{$tanggalBerangkat}}</td>
                        </tr>

                        <tr>
                            <td>Waktu Berangkat</td>
                            <td style="font-weight: bold; text-align:right;">{{$waktuBerangkat}}</td>
                        </tr>

                        <tr>
                            <td>Driver</td>
                            <td style="font-weight: bold; text-align:right;">{{$jadwal->supirs->nama_supir}}</td>
                        </tr>

                    </table>

                </div>
            </div>

        </div>
    </div>
</div>
