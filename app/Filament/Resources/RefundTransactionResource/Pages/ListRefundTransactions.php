<?php

namespace App\Filament\Resources\RefundTransactionResource\Pages;

use App\Filament\Resources\RefundTransactionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRefundTransactions extends ListRecords
{
    protected static string $resource = RefundTransactionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
