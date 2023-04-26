<?php

namespace App\Filament\Resources\AngkutanResource\Pages;

use App\Filament\Resources\AngkutanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAngkutans extends ListRecords
{
    protected static string $resource = AngkutanResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
