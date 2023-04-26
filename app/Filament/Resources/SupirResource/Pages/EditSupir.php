<?php

namespace App\Filament\Resources\SupirResource\Pages;

use App\Filament\Resources\SupirResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSupir extends EditRecord
{
    protected static string $resource = SupirResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
