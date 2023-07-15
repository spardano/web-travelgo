<?php


namespace App\Filament\Resources\PaymentResource\Widgets;

use App\Models\PaymentTransactions;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class totalPaymentSettle extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Pembayaran', 'Rp. ' . number_format(PaymentTransactions::where('payment_status', 2)->sum('gross_amount'))),
            Card::make('Total Pending', 'Rp.' . number_format(PaymentTransactions::where('payment_status', 1)->sum('gross_amount')))
                ->color('warning'),
            Card::make('Total Expired', 'Rp.' . number_format(PaymentTransactions::where('payment_status', 3)->sum('gross_amount')))
                ->color('secondary'),
        ];
    }
}
