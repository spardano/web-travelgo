<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RefundTransactionResource\Pages;
use App\Filament\Resources\RefundTransactionResource\RelationManagers;
use App\Models\Refund;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RefundTransactionResource extends Resource
{
    protected static ?string $navigationGroup = 'Transaksi';
    protected static ?string $navigationLabel = 'Refund Dana';
    protected static ?string $model = Refund::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name'),
                Tables\Columns\TextColumn::make('id_booking'),
                Tables\Columns\TextColumn::make('rekening'),
                Tables\Columns\TextColumn::make('bank'),
                Tables\Columns\TextColumn::make('atas_nama'),
                Tables\Columns\TextColumn::make('no_transaksi'),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
                Tables\Columns\TextColumn::make('alasan'),
                BadgeColumn::make('status')
                    ->enum([
                        1 => 'Proses',
                        2 => 'Selesai',
                        0 => 'Ditolak'
                    ])
                    ->colors([
                        'success' => 2,
                        'danger' => 0,
                        'primary' => 1,
                    ])
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRefundTransactions::route('/'),
            'create' => Pages\CreateRefundTransaction::route('/create'),
            'edit' => Pages\EditRefundTransaction::route('/{record}/edit'),
        ];
    }
}
