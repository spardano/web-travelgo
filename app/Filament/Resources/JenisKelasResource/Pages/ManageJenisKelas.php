<?php

namespace App\Filament\Resources\JenisKelasResource\Pages;

use App\Filament\Resources\JenisKelasResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageJenisKelas extends ManageRecords
{
    protected static string $resource = JenisKelasResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
