<?php

namespace App\Filament\Resources\RefundTransactionResource\Pages;

use App\Filament\Resources\RefundTransactionResource;
use Filament\Resources\Pages\Page;

class refundAction extends Page
{
    protected static string $resource = RefundTransactionResource::class;

    protected static string $view = 'filament.resources.refund-transaction-resource.pages.refund-action';
}
