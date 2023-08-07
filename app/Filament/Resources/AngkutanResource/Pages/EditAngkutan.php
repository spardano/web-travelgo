<?php

namespace App\Filament\Resources\AngkutanResource\Pages;

use App\Filament\Resources\AngkutanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAngkutan extends EditRecord
{
    protected static string $resource = AngkutanResource::class;
    protected static bool $canCreateAnother = false;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
