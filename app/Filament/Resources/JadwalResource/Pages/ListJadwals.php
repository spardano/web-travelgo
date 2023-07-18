<?php

namespace App\Filament\Resources\JadwalResource\Pages;

use App\Filament\Resources\JadwalResource;
use App\Models\Jadwal;
use Carbon\Carbon;
use Closure;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJadwals extends ListRecords
{
    protected static string $resource = JadwalResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function isTableRecordSelectable(): ?Closure
    {
        return fn (Jadwal $record): bool => $record->tgl_keberangkatan >= Carbon::now();
    }
}
