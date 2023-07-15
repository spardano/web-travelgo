<?php

namespace App\Filament\Resources\RefundTransactionResource\Pages;

use App\Filament\Resources\RefundTransactionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRefundTransaction extends EditRecord
{
    protected static string $resource = RefundTransactionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
