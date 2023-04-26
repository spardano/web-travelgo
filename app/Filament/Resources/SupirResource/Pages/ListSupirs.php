<?php

namespace App\Filament\Resources\SupirResource\Pages;

use App\Filament\Resources\SupirResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSupirs extends ListRecords
{
    protected static string $resource = SupirResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
