<?php

namespace App\Filament\Resources\AreaKerjaResource\Pages;

use App\Filament\Resources\AreaKerjaResource;
use App\Filament\Resources\AreaKerjaResource\Widgets\MapAreaKerjaWidget;
use Filament\Resources\Pages\CreateRecord;

class CreateAreaKerja extends CreateRecord
{
    protected static string $resource = AreaKerjaResource::class;
    protected static bool $canCreateAnother = false;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
