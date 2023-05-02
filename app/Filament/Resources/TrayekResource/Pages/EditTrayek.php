<?php

namespace App\Filament\Resources\TrayekResource\Pages;

use App\Filament\Resources\TrayekResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTrayek extends EditRecord
{
    protected static string $resource = TrayekResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['area_persinggahan'] = json_decode($data['area_persinggahan'], true);
        return $data;
    }
}
