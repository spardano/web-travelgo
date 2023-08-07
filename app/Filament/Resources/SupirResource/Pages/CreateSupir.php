<?php

namespace App\Filament\Resources\SupirResource\Pages;

use App\Filament\Resources\SupirResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSupir extends CreateRecord
{
    protected static string $resource = SupirResource::class;
    protected static bool $canCreateAnother = false;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
