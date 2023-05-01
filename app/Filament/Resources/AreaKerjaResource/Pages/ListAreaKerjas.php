<?php

namespace App\Filament\Resources\AreaKerjaResource\Pages;

use App\Filament\Resources\AreaKerjaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAreaKerjas extends ListRecords
{
    protected static string $resource = AreaKerjaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
