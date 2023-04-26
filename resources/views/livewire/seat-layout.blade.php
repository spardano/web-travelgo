<div>

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
                    @for ($i = $numColumns; $i > 0; $i--)

                        @for ($j = $numRows; $j > 0; $j--)
                            <div class="w-full h-24 rounded-md text-white text-center py-4 px-4" style="background-color: rgb(198, 198, 212)">
                                
                                <svg style="margin: 0 auto;" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>

                                Tambah Bangku

                            </div>     
                        @endfor

                    @endfor
                </div>
            @endif
        </div>
  
    </div>
      
</div>
