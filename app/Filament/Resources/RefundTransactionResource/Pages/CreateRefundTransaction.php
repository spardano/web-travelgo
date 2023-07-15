<?php

namespace App\Filament\Resources\RefundTransactionResource\Pages;

use App\Filament\Resources\RefundTransactionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRefundTransaction extends CreateRecord
{
    protected static string $resource = RefundTransactionResource::class;
}
