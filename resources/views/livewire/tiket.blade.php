<div>
    <div class="py-4">
        @include('components.alert')
    </div>

    @if ($isManualEnabled)
        <div style="width: 100%; margin-bottom:40px;">
            <form wire:submit.prevent="simpanPengisianTiketManual()" class="w-full">
                <div class="flex mb-6">
                    <div class="w-full px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-first-name">
                            Nomor Bangku
                        </label>
                        <input wire:model="id_tiket"
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            id="grid-first-name" type="hidden" readonly>
                        <input wire:model="seat_number"
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            id="grid-first-name" type="text" readonly>
                        @error('seat_number')
                            <span class="error text-danger-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-last-name">
                            Nomor WA / HP
                        </label>
                        <input wire:model="nomor_hp_wa"
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                            id="grid-last-name" type="text" placeholder="+628228344XXXX">
                        @error('nomor_hp_wa')
                            <span class="error text-danger-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex mb-6">
                    <div class="w-full px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-first-name">
                            Nama Penumpang
                        </label>
                        <input wire:model="nama_penumpang"
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            id="grid-first-name" type="text" placeholder="Jane Doe">
                        @error('nama_penumpang')
                            <span class="error text-danger-500">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <div class="flex mb-6">
                    <div class="w-full px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-first-name">
                            Harga Tiket
                        </label>
                        <input wire:model="harga_tiket"
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            id="grid-first-name" type="text" readonly>
                        @error('harga_tiket')
                            <span class="error text-danger-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-last-name">
                            Penambahan Biaya
                        </label>
                        <input wire:model="penambahan_biaya"
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                            id="grid-last-name" type="text">
                        @error('penambahan_biaya')
                            <span class="error text-danger-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="flex mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-password">
                            Alamat Penjemputan
                        </label>
                        <textarea wire:model="alamat_penjemputan"
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                            id="grid-password"></textarea>
                        <p class="text-grey-dark text-xs italic">Contoh: Jl.Sudirman, Kel. Payung Sekaki, Kec.Tampan,
                            Pekanbaru, Riau</p>
                        @error('alamat_penjemputan')
                            <span class="error text-danger-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-password">
                            Alamat Pengantaran
                        </label>
                        <textarea wire:model="alamat_pengantaran"
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                            id="grid-password"></textarea>
                        <p class="text-grey-dark text-xs italic">Contoh: Jl.Sudirman, Kel. Payung Sekaki, Kec.Tampan,
                            Pekanbaru, Riau</p>
                        @error('alamat_pengantaran')
                            <span class="error text-danger-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="flex mb-2">
                    <div class="w-full px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-state">
                            Status Booking
                        </label>
                        <div class="relative">
                            <select wire:model="status"
                                class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                id="grid-state">
                                <option value="0">Pilih Status Booking</option>
                                <option value="1">Booking</option>
                                <option value="2">Sudah Dibayar</option>
                            </select>
                            @error('status')
                                <span class="error text-danger-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="flex mb-2">
                    <div class="w-full px-3 mb-6 md:mb-0">

                        @if ($isEditEnabled == true)
                            <button type="submit"
                                class="px-4 py-2 text-sm bg-primary-500 font-medium text-gray-700 border border-gray-700 rounded-md hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-gray-700">
                                + Pembeilan Tiket Manual
                            </button>
                        @endif

                        <button type="button" wire:click="keluarFormManual()"
                            class="px-4 py-2 text-sm bg-gray-500 font-medium text-white-700 border border-gray-700 rounded-md hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-gray-700">
                            Keluar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    @endif
    <div class="grid grid-cols-3 gap-4">

        @foreach ($tikets as $tiket)
            <div>
                <div class="shadow rounded-md">
                    <div class="p-4">
                        <div class="flex flex-row">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                            </svg>
                            <label class="ml-2">{{ $tiket->detailBangku->kode_bangku }}</label>
                        </div>

                        <div class="grid grid-cols-2 gap-2 mt-2">
                            <div>Status</div>
                            <div>

                                @if ($tiket->status_tiket == 1)
                                    <span
                                        class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium text-white"
                                        style="background: #2ecc71">
                                        Tersedia
                                    </span>
                                @endif

                                @if ($tiket->status_tiket == 0)
                                    <span
                                        class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium text-white"
                                        style="background: red">
                                        Tak-Tersedia
                                    </span>
                                @endif

                                @if ($tiket->status_tiket == 2)
                                    <span
                                        class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium text-white"
                                        style="background: orange">
                                        Booked
                                    </span>
                                @endif

                                @if ($tiket->status_tiket == 3)
                                    <span
                                        class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium text-white"
                                        style="background: green">
                                        Confirm
                                    </span>
                                @endif

                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-2 border-b-4 mb-2">
                            <div>Harga</div>
                            <div>Rp. {{ number_format($tiket->harga_tiket) }}</div>
                        </div>

                        <div>
                            @if ($tiket->status_tiket != 3)
                                @if ($tiket->status_tiket != 0)
                                    <button wire:click="isiTiketManual({{ $tiket }})" type="button"
                                        class="px-4 py-2 text-sm font-medium text-gray-700 border border-gray-700 rounded-md hover:bg-gray-700 hover:text-primary-500 focus:outline-none focus:ring-2 focus:ring-gray-700">
                                        + Manual
                                    </button>
                                @endif

                                @if ($tiket->status_tiket != 2)
                                    <button type="button"
                                        wire:click="ubahStatusKetersediaanTitet({{ $tiket }})"
                                        class="px-4 py-2 text-sm font-medium text-gray-700 border border-gray-700 rounded-md hover:bg-gray-700 {{ $tiket->status_tiket == 1 ? 'hover:text-danger-500' : 'hover:text-success-500' }} focus:outline-none focus:ring-2 focus:ring-gray-700">

                                        @if ($tiket->status_tiket == 1)
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                            </svg>
                                        @endif

                                        @if ($tiket->status_tiket == 0)
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        @endif

                                    </button>
                                @endif
                            @endif

                        </div>
                    </div>

                    @if (count($tiket->bookingDetail) > 0)
                        @foreach ($tiket->bookingDetail as $booking)
                            <div style="border-top: 1px solid rgba(172, 170, 170, 0.742);">
                                <div>
                                    <div class="flex flex-row justify-between w-100">

                                        <div class="flex-auto p-2">
                                            <a class="hover:text-primary-500"
                                                wire:click="showEditBooking({{ $booking }})">
                                                <h5>{{ $booking->nama_penumpang }}</h5>
                                            </a>
                                            <p class="text-sm">{{ $booking->nomor_hp_wa }}</p>
                                        </div>
                                        <div class="flex-auto w-100">
                                            @if ($booking->booking->status == 2)
                                            <div wire:click="printTicket({{ $booking->booking->id }}, {{$booking->ticket->id}})"
                                                class="p-1 text-white" style="background: #312ecc;">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
                                                </svg>
                                                  
                                            </div>

                                            <div wire:click="printInvoice({{ $booking->booking->id }})"
                                                class="p-1 text-white" style="background: #cccc2e;">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 14.25l6-6m4.5-3.493V21.75l-3.75-1.5-3.75 1.5-3.75-1.5-3.75 1.5V4.757c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0c1.1.128 1.907 1.077 1.907 2.185zM9.75 9h.008v.008H9.75V9zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm4.125 4.5h.008v.008h-.008V13.5zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                                </svg>
                                            </div>

                                            @endif
                                            @if ($booking->booking->status != 2)
                                                <div wire:click="rejectBooking({{ $booking->booking->id }})"
                                                    class="p-1 text-white" style="background: #fc5c65;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                        stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                </div>

                                                <div wire:click="comfirmBooking({{ $booking->booking->id }})"
                                                    class="p-1 text-white" style="background: #2ecc71;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                        stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </div>
                                            @endif

                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        @endforeach

    </div>
