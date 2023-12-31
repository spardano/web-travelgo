<section id="jadwal" class="services section-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Jadwal Keberangkatan</h2>
            <p>Temukan jadwal keberangkatan, kota penjemputan, kota pengantaran yang sesuai dengan kebutuhanmu
            </p>
        </div>
        <div class="row" style="padding-bottom: 10px;">
            @foreach ($data_baru as $item)
                <div class="col-md-6  align-items-stretch mt-4" style="min-height: 180px;" data-aos="zoom-in"
                    data-aos-delay="100">
                    <div class="icon-box">

                        @php
                            // Menggunakan Carbon untuk memanipulasi tanggal_berangkat
                            $tanggalBerangkat = \Illuminate\Support\Carbon::parse($item['tanggal_berangkat']);
                            $waktuBerangkat = \Illuminate\Support\Carbon::parse($item['waktu_berangkat']);
                        @endphp
                        
                        <div class="row mb-2">

                            <div class="col-md-6">
                                <h5 style="text-transform: uppercase">{{ $item['nama_trayek'] }}</h5>
                            </div>
                            <div class="col-md-6 text-end">
                                <span class="badge rounded-pill text-bg-secondary">{{ $tanggalBerangkat->format('d M Y') }}</span>
                                <span class="badge rounded-pill text-bg-light">{{ $item['nama_kelas'] }}</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 text-center">
                                <img src="{{$item['thumbnail']}}" class="mb-2" style="object-fit: cover; height:100px; width:100px; border-radius:100%;" alt="">
                                <p class="text-secondary" style="font-weight: bold; font-size:22px;">{{ $item['nama_angkutan'] }}</p> 
                            </div>

                            <div class="col-xl-4">

                                <div class="card">
                                    <div class="card-body">
                                      <h5>Tiket Tersedia</h5>

                                      @if ($item['tiket_tersedia'] > 0)
                                      <h2 class="card-text">{{ $item['tiket_tersedia'] }}</h2>
                                      @else
                                      <h2 class="card-text text-danger">Habis</h2>
                                      @endif
                                    </div>
                                </div>  
                                
                            </div>

                            <div class="col-xl-4">

                                <div class="card">
                                    <div class="card-body">
                                      <h5>Harga</h5>
                                      <h5 class="card-text text-info">Rp.{{ number_format($item['harga']) }}</h5>
                                    </div>
                                </div>

                                {{-- <button type="button" class="btn btn-info text-white mt-4" data-bs-toggle="modal" data-bs-target="#modalBookingTiket">Booking Tiket</button> --}}
                                <button type="button" class="btn btn-info text-white mt-4 btnModalTiket"  data-id="{{ $item['id_jadwal']}}">Booking Tiket</button>
                                
                            </div>
                            
                        </div>

            
                    </div>
                </div>
                @endforeach
            </div>
    </div>
</section>

@livewire('form-booking')

@if (!empty(Session::get('access_token')))
    @livewire('pemesanan', ['id_user' => Session::get('id_cus')])
@endif
  
@push('js')
<script>
    $('.btnModalTiket').on('click', function(){
        const id = $(this).data('id')
        Livewire.emit('setJadwaId', id)
        $('#modalBookingTiket').modal('show')
    })

    $('#modalBookingTiket').on('hidden.bs.modal', function () {
        Livewire.emit('resetContent');
    });
</script>
@endpush
