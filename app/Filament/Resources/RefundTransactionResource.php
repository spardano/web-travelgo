<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RefundTransactionResource\Pages;
use App\Filament\Resources\RefundTransactionResource\RelationManagers;
use App\Models\Booking;
use App\Models\Refund;
use Filament\Forms;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
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
                        '1' => 'Disetujui',
                        '2' => 'Ditolak',
                        '0' => 'Proses'
                    ])
                    ->colors([
                        'success' => '1',
                        'danger' => '2',
                        'primary' => '0',
                    ])
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('setujui')->icon('heroicon-o-check')->color('success')->action(function ($record): void {
                    self::approved($record);
                })->form([
                    SpatieMediaLibraryFileUpload::make('bukti_refund')
                        ->label('Upload Bukti Refund')
                        ->required()
                        ->collection('foto_kendaraan'),
                ])->visible(function ($record) {
                    return $record->status == 0;
                }),
                Tables\Actions\Action::make('tolak')->icon('heroicon-o-x-circle')->color('danger')->action(function ($data, $record): void {
                    self::rejected($record, $data);
                })->form([
                    Textarea::make('alasan_penolakan')->label('Alasan Penolakan')->required(),
                ])->visible(function ($record) {
                    return $record->status == 0;
                }),
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function approved(Refund $record)
    {
        $record->status = 1;
        $record->save();
    }

    public static function rejected($record, $data)
    {
        $record->alasan_penolakan = $data['alasan_penolakan'];
        $record->status = 2;
        $record->save();

        //ubah status booking
        Booking::where('id', $record->id_booking)->update([
            'status' => 2
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

    public static function canCreate(): bool
    {
        return false;
    }
}
