<div>

    @if ($isManualEnabled)
    <div style="width: 100%; margin-bottom:40px;">
        <form class="w-full">
            <div class="flex mb-6">
                <div class="w-full px-3 mb-6 md:mb-0">
                  <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                    Nomor Bangku
                  </label>
                  <input wire:model="seat_number" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" readonly>
                </div>
                
                <div class="w-full px-3">
                  <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
                    Nomor WA / HP
                  </label>
                  <input wire:model="nomor_hp" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-grey" id="grid-last-name" type="text" placeholder="+628228344XXXX">
                </div>
              </div>

            <div class="flex mb-6">
              <div class="w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                  Nama Penumpang
                </label>
                <input wire:model="nama_penumpang" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Jane Doe">
              </div>
              
              <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
                  Nomor WA / HP
                </label>
                <input wire:model="nomor_hp" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-grey" id="grid-last-name" type="text" placeholder="+628228344XXXX">
              </div>
            </div>

            <div class="flex mb-6">
                <div class="w-full px-3 mb-6 md:mb-0">
                  <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                    Harga Tiket
                  </label>
                  <input wire:model="harga_tiket" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Rp. 150,000" readonly>
                </div>
                
                <div class="w-full px-3">
                  <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
                    Penambahan Biaya
                  </label>
                  <input wire:model="penambahan_biaya" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-grey" id="grid-last-name" type="text" placeholder="Rp. 30,000">
                </div>
              </div>
            <div class="flex mb-6">
              <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
                  Alamat Penjemputan
                </label>
                <textarea wire:model="alamat" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey" id="grid-password"></textarea>
                <p class="text-grey-dark text-xs italic">Contoh: Jl.Sudirman, Kel. Payung Sekaki, Kec.Tampan, Pekanbaru, Riau</p>
              </div>
            </div>
            <div class="flex mb-2">
              <div class="w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-state">
                  Status Booking
                </label>
                <div class="relative">
                  <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey" id="grid-state">
                    <option value="1">Booking</option>
                    <option value="2">Sudah Dibayar</option>
                  </select>
                 
                </div>
              </div>
            </div>
          </form>
    </div>
    @endif

    <div class="grid grid-cols-3 gap-4">

        @foreach ($tikets as $tiket)
        <div class="shadow rounded-md">
            <div class="p-4">
                <div class="flex flex-row">     
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                    </svg>
                    <label class="ml-2">{{$tiket->detailBangku->kode_bangku}}</label>
                  </div>
    
                  <div class="grid grid-cols-2 gap-2 mt-2">
                    <div>Status</div>
                    <div>

                        @if ($tiket->status_tiket == 1)    
                        <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium text-white" style="background: #2ecc71">
                            Tersedia
                        </span>
                        @endif

                        @if ($tiket->status_tiket == 0)    
                        <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium text-white" style="background: red">
                            Tak-Tersedia
                        </span>
                        @endif

                        @if ($tiket->status_tiket == 2)    
                        <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium text-white" style="background: orange">
                            Booked
                        </span>
                        @endif

                        @if ($tiket->status_tiket == 3)    
                        <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium text-white" style="background: green">
                            Confirm
                        </span>
                        @endif

                    </div>
                  </div>
    
                  <div class="grid grid-cols-2 gap-2 border-b-4 mb-2">
                    <div>Harga</div>
                    <div>Rp. {{number_format($tiket->harga_tiket)}}</div>
                  </div>

                  <div>
                    @if ($tiket->status_tiket != 3)  
                    <button wire:click="isiTiketManual({{$tiket}})" type="button" class="px-4 py-2 text-sm font-medium text-gray-700 border border-gray-700 rounded-md hover:bg-gray-700 hover:text-primary-500 focus:outline-none focus:ring-2 focus:ring-gray-700">
                        + Manual
                    </button>

                    @if ($tiket->status_tiket != 2)
                    <button type="button" wire:click="ubahStatusKetersediaanTitet({{$tiket}})" class="px-4 py-2 text-sm font-medium text-gray-700 border border-gray-700 rounded-md hover:bg-gray-700 {{ $tiket->status_tiket == 1 ? 'hover:text-danger-500' : 'hover:text-success-500'  }} focus:outline-none focus:ring-2 focus:ring-gray-700">

                        @if ($tiket->status_tiket == 1)   
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                            </svg>
                        @endif

                        @if ($tiket->status_tiket == 0)   
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                          </svg>
                        @endif

                    </button>
                    @endif
                    
                    @endif

                  </div>
            </div>
             
            {{-- <div style="border-top: 1px solid rgba(172, 170, 170, 0.742);">
                <div>
                    <div class="flex flex-row justify-between w-100">
                        <div class="flex-auto p-2 w-10 mt-4">
                            <div class="rounded-full" style="background: blue; width:40px; height:40px;"></div>
                        </div>
                        <div class="flex-auto p-2 mt-4">
                            <h5>Nama Penumpang</h5>
                            <p class="text-sm">+62 822 8344 3049</p>
                        </div>
                        <div class="flex-auto w-100">
                            <div class="p-1 text-white" style="background: #fc5c65;">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="p-1 text-white" style="background: #2ecc71;">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                  </svg>
                            </div>
                            <div class="p-1 text-white" style="background: #3498db;">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                        </div>
                      </div>
                    
                </div>
            </div>

            <div style="border-top: 1px solid rgba(172, 170, 170, 0.742);">
                <div>
                    <div class="flex flex-row justify-between w-100">
                        <div class="flex-auto p-2 w-10 mt-4">
                            <div class="rounded-full" style="background: blue; width:40px; height:40px;"></div>
                        </div>
                        <div class="flex-auto p-2 mt-4">
                            <h5>Nama Penumpang</h5>
                            <p class="text-sm">+62 822 8344 3049</p>
                        </div>
                        <div class="flex-auto w-100">
                            <div class="p-1 text-white" style="background: #fc5c65;">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="p-1 text-white" style="background: #2ecc71;">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                  </svg>
                            </div>
                            <div class="p-1 text-white" style="background: #3498db;">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                        </div>
                      </div>
                    
                </div>
            </div> --}}

        </div>
        @endforeach
      
      </div>
</div>
