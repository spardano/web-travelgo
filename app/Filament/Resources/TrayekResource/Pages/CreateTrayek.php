<?php

namespace App\Filament\Resources\TrayekResource\Pages;

use App\Filament\Resources\TrayekResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTrayek extends CreateRecord
{
    protected static string $resource = TrayekResource::class;
    protected static bool $canCreateAnother = false;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['area_persinggahan'] = json_encode($data['area_persinggahan']);
        return $data;
    }
}
