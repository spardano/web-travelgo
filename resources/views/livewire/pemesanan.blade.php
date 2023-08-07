<div>
    <div wire:ignore.self class="modal fade" id="pemesananModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Data Pemesanan</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

              <div class="row">

                <div class="col-md-12">
                  <div class="alert alert-info" role="alert">
                    Catatan: Pembatalan perjalanan dan refund dapat menghubungi kontak whatsapp (+62 895-6189-58338) atau ke email (sakti.pardano29@gmail.com).
                  </div>
                </div>

                
                @if ($data_pemesanan)

                  @foreach ($data_pemesanan as $item)   
                  <div class="col-md-4 mb-2">
                    <div class="card">
                      <img class="card-img-top" src="{{$item->thumbnail}}" alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title">{{$item->nama_trayek}}</h5>

                        @if ($item->status == 1)
                          <span class="badge rounded-pill text-bg-warning">Booking</span>
                        @elseif ($item->status == 2)
                          <span class="badge rounded-pill text-bg-success">Terkonfirmasi</span>
                        @elseif($item->status == 3)
                          <span class="badge rounded-pill text-bg-secondary">Expired</span>
                        @elseif($item->status == 4)
                          <span class="badge rounded-pill text-bg-danger">Batal</span>
                        @else
                          <span class="badge rounded-pill text-bg-light">Telah Di Refund</span>
                        @endif

                       
                        <table width="100%">
                          <tr>
                            <td>Jumlah Tiket</td>
                            <td style="font-weight: bold; text-align:right;">
                              {{$item->jml_tiket}}
                            </td>
                          </tr>
                          <tr>
                            <td>Tanggal Berangkat</td>
                            <td style="font-weight: bold; text-align:right;">
                              {{$item->tanggal_berangkat}}
                            </td>
                          </tr>
                          <tr>
                            <td>Waktu Berangkat</td>
                            <td style="font-weight: bold; text-align:right;">
                              {{$item->waktu_berangkat}}
                            </td>
                          </tr>
                          <tr>
                            <td>Total Harga</td>
                            <td class="text-info" style="font-weight: bold; font-size:23px; text-align:right;">
                              Rp. {{ number_format($item->total_biaya) }}
                            </td>
                          </tr>
                        </table>

                        <div class="row">

                          @if ($item->status == 1)
                          {{-- <div class="col">
                            <button style="width:100%" class="btn btn-danger mt-2">Batalkan</button>
                          </div> --}}
                          <div class="col">
                            <button style="width:100%" class="btn btn-success mt-2" wire:click="bayarBooking({{$item->id_booking}})">Bayar</button>
                          </div>
                          @endif

                          {{-- @if ($item->status == 2)
                          <div class="col">
                            <button style="width:100%" class="btn btn-secondary mt-2">Refund</button>
                          </div>
                          @endif --}}
                          
                        </div>


                      </div>
                    </div>
                  </div> 
                  @endforeach

                @else

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
