<div>
    <div wire:ignore.self class="modal fade" id="modalBookingTiket"  tabindex="-1">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Booking Tiket</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row">

                    <div class="text-center">
                            @include('livewire.simple-loadin', ['message' => 'Menyimpan data ...', 'target' => 'storeBooking'])
                    </div>
            
                    @if ($isAuthenticated)
                        @if ($isOpenPayment == false && $jadwal)
                        <div class="col-md-6">
                            <h4>Pilih Bangku</h4>
            
                            <div class="card">
                                <div class="card-body">
            
                                    <div class="row">
                                        @foreach ($jadwal->angkutan->detail_bangku as $index => $item)    
                                            <div wire:key="{{ $item->tiket ? $item->tiket->id : $index.$jadwal->id }}" class="col-sm-{{$maxColumnLayout}} mt-2">
                                                <div class="card {{ $item->tiket ?  '' : 'text-bg-danger'  }} ">
                                                    <div class="card-body text-center">
                                                        
                                                        @if ($item->tiket && $item->tiket->status_tiket != 3)
                                                            <input class="form-check-input" type="checkbox" id="flexCheckDefault" wire:click="selectSeat({{$item}})">
                                                        @elseif($item->tiket && $item->tiket->status_tiket == 3)
                                                            <label class="text-danger">Terjual</label>
                                                        @endif
                                                     <p style="font-size: 15px;">{{$item->kode_bangku}}</p>
                                                    </div>
                                                </div>  
                                            </div>
                                        @endforeach
                                    </div>
            
                                </div>
                            </div>
                        </div>
                        @endif
                        
            
                        @if ($jadwal)
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
            
                            @if ($isOpenPayment == false)
                            <div class="card mt-2">
                                <div class="card-body text-center">
            
                                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" wire:model="paymentMethod" wire:click="hitungTagihan()" value="online" autocomplete="off" checked>
                                        <label class="btn btn-outline-primary" for="btnradio1">Bayar Online</label>
                                    
                                        <input type="radio" class="btn-check" name="btnradio" id="btnradio2" wire:model="paymentMethod" wire:click="hitungTagihan()" value="lansung" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="btnradio2">Bayar Lansung</label>
                                    </div>
            
                                </div>
                            </div>
                            @endif
            
                            <div class="card mt-2">
                                <div class="card-body">
            
                                    @foreach ($selectedSeat as $item)
                                    <span class="badge bg-secondary">{{$item['kode_bangku']}}</span>
                                    @endforeach
            
                                    @if ($selectedSeat)     
                                    <table width="100%">
                                        <tr>
                                            <td>Total tiket</td>
                                            <td class="text-end">{{count($selectedSeat)}} x <b>Rp. {{ number_format($selectedSeat[0]['tiket']['harga_tiket'])}}</b> </td>
                                        </tr>
                                        <tr style="border-bottom: 1px solid gray;">
                                            <td>
                                                Biaya Admin
                                            </td>
                                            <td class="text-end" style="font-weight: bold">
                                                @if ($paymentMethod == 'online')
                                                Rp. {{number_format($biayaAdmin)}}
                                                @else
                                                Rp. {{ 0 }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Total Tagihan</td>
            
                                            <td class="text-end text-info" style="font-weight: bold">
                                                Rp. {{ number_format($totalTagihan) }}
                                            </td>
                                        </tr>
                                    </table>
                                    @endif
            
                                </div>
                            </div>
            
                            @if ($isOpenPayment == false)
                                <button type="button" class="btn btn-primary mt-2" style="width: 100%" wire:click="storeBooking">Booking</button>
                            @endif
            
                        </div>
                        @endif
                        
            
                        @if ($isOpenPayment)
                            <div class="col-md-6">
                                <h4>Pembayaran</h4>
                                <div class="card" style="min-height: 600px;">
                                    <div class="card-body">
                                        
                                        <iframe src="{{url('payment/'.$paymentNumber)}}" frameborder="0" style="height: 100%; width:100%;"></iframe>
                    
                                    </div>
                                </div>
                            </div>
                        @endif
            
                    @else
            
                    <div class="container">
                        <div class="alert alert-danger" role="alert">
                            Anda harus login untuk mem-Booking tiket
                        </div>
                    </div>
                    @endif
            
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
    </div>

    
</div>
