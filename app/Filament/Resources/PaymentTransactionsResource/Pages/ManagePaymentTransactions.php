<?php

namespace App\Filament\Resources\PaymentTransactionsResource\Pages;

use App\Filament\Resources\PaymentTransactionsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePaymentTransactions extends ManageRecords
{
    protected static string $resource = PaymentTransactionsResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
    public static function canCreate(): bool
    {
        return false;
    }
}
