<?php

namespace App\Filament\Resources\JadwalResource\Pages;

use App\Filament\Resources\JadwalResource;
use App\Models\DetailBangku;
use App\Models\Ticket;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Ramsey\Uuid\Type\Integer;

class CreateJadwal extends CreateRecord
{
    protected static string $resource = JadwalResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function afterCreate(): void
    {
        //aksi create open ticket berdasarkan bangku tersedia
        $layoutBangku = DetailBangku::where('id_angkutan', $this->record->id_angkutan)->get();

        $hargaTiket = $this->hitungHargaTiket($this->record);

        foreach ($layoutBangku as $item) {
            if ($item->ketersediaan == 1) {
                Ticket::create([
                    'id_jadwal' => $this->record->id,
                    'id_seat' => $item->id,
                    'harga_tiket' => $hargaTiket,
                    'status_tiket' => 1,
                ]);
            }
        }
    }

    function hitungHargaTiket($data_jadwal)
    {
        $biayaBasis = $data_jadwal->trayek->harga_basis;
        $biayaKelas = $data_jadwal->jenis_kelas->penambahanBiaya;

        $total_harga = $biayaBasis + $biayaKelas;
        return $total_harga;
    }
}