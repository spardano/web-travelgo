<div>

    <div class="py-4">
        @include('components.alert')
    </div>

    <div class="grid grid-cols-2 gap-4">
        
        <div wire:ignore>
            <p class="antialiased text-inherit text-sm">Isikan Jumlah Baris dan Kolom Bangku</p>
            <div class="w-full py-3">
                <label for="" class="antialiased text-inherit text-xs">Baris</label>
                <select wire:model="numRows" class="w-full rounded text-pink-500" place>
                    @for ($i =1; $i <= 20; $i++)
                        <option value="{{ $i }}">{{ $i }} Baris</option>
                    @endfor 
                </select>
            </div>
            <div wire:change="generateSeatMap" class="w-full py-3">
                <label for="" class="antialiased text-inherit text-xs">Kolom</label>
                <select wire:model="numColumns" class="w-full rounded text-pink-500">
                        @for ($i =1; $i <= 8; $i++)
                            <option value="{{ $i }}">{{ $i }} Kolom</option>
                        @endfor 
                </select>
            </div>

        </div>

        <div>
            @if ($displayMap)
                <div class="grid grid-cols-{{$numColumns}} gap-2">
                
                    @for ($i = 1; $i <= $numRows; $i++)

                        @for ($j = 1; $j <= $numColumns; $j++)

                        @php
                            $skipNext = false;
                        @endphp

                        @if (isset($this->bangku) && isset($this->bangku->detail_bangku))

                            @foreach ($this->bangku->detail_bangku as $item) 
                            
                                @if ($item->baris == $i && $item->kolom == $j)
                                    <div  class="w-full h-24 rounded-md text-white text-center py-4 px-4 @if($item->ketersediaan == 1) bg-success-500 @else bg-warning-500  @endif ">
                                            
                                        <svg wire:click="hapusBangku({{$item->id}})" style="margin: 0 auto;" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        
                                        {{$item->kode_bangku}}

                                    </div> 

                                    @php
                                        $skipNext = true;
                                    @endphp
                                @endif
                            
                            @endforeach
                            
                        @endif

                        @if (!$skipNext)
                        <div wire:click="addBangku({{$i}}, {{$j}})" class="w-full h-24 rounded-md text-white text-center py-4 px-4" style="background-color: rgb(198, 198, 212)">
                                    
                            <svg style="margin: 0 auto;" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Tambah Bangku
                        </div>
                        @endif

                        @endfor

                    @endfor
                </div>
            @endif
        </div>

        <div class="wire ignore">

        </div>

        @if ($displayAddSeat)
        <div wire:ignore>
            <p class="antialiased text-inherit text-sm">Penambahan Ketersediaan Bangku</p>

            <div class="flex flex-row py-3">
                <div class="basis-1/2">
                    <label for="">Baris</label>
                    <input type="number" wire:model="baris" class="w-full rounded text-pink-500" readonly>
                </div>
                <div class="basis-1/2">
                    <label for="">Kolom</label>
                    <input type="number" wire:model="kolom" class="w-full rounded text-pink-500" readonly>
                </div>
            </div>

            <div class="w-full py-3">
                <input type="text" wire:model="seat_code" class="w-full rounded" placeholder="Kode Bangku">
            </div>

            <div class="w-full py-3">
                <select wire:model="availability" class="w-full rounded text-pink-500">
                    <option value="0">Pilih Ketersediaan</option>
                    <option value="0">Tidak Tersedia</option>
                    <option value="1">Tersedia</option>
                    <option value="2">Bangku Sopir</option>
                </select>
            </div>

            <div wire:ignore class="w-full py-3">
                <button type="button" wire:click="storeBangku()" class="rounded-full bg-primary-500 py-2 px-2 text-white drop-shadow-sm hover:bg-primary-600 active:bg-primary-700 focus:outline-none focus:ring focus:ring-primary-300">+ Tambah Bangku</button>
            </div>

        </div>
        @endif
        
    </div>
      
</div>
