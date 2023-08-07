<?php

namespace App\Filament\Resources\AngkutanResource\Pages;

use App\Filament\Resources\AngkutanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAngkutan extends CreateRecord
{
    protected static string $resource = AngkutanResource::class;
    protected static bool $canCreateAnother = false;
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
