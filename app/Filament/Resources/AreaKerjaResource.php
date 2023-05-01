<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AreaKerjaResource\Pages;
use App\Filament\Resources\AreaKerjaResource\Pages\GeomArea;
use App\Models\AreaKerja;
use App\Models\KabupatenKota;
use App\Models\Provinsi;
use Filament\Forms;
use Filament\Tables\Actions\Action;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AreaKerjaResource extends Resource
{
    protected static ?string $model = AreaKerja::class;
    protected static ?string $navigationGroup = 'DATA';
    protected static ?string $navigationLabel = 'Area Kerja';
    protected static ?string $navigationIcon = 'heroicon-o-map';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('provinsi')
                    ->label('Provinsi')
                    ->options(Provinsi::all()->pluck('nama_provinsi', 'id'))
                    ->searchable()
                    ->required()
                    ->reactive(),
                Forms\Components\Select::make('id_kabupaten')
                    ->label('Kabupaten / Kota')
                    ->options(function ($get) {
                        $provinsi = Provinsi::find($get('provinsi'));

                        if (!$provinsi) {
                            return KabupatenKota::all()->pluck('nama_kab_kota', 'id');
                        }

                        return $provinsi->kabupatenKota->pluck('nama_kab_kota', 'id');
                    })
                    ->searchable()
                    ->required(),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kabupatenKota.nama_kab_kota'),
                Tables\Columns\TextColumn::make('kabupatenKota.provinsi.nama_provinsi'),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Action::make('area')
                    ->url(function ($record) {
                        return 'area-kerjas/' . $record->id . '/area';
                    })
                    ->color('danger')
                    ->icon('heroicon-o-map')
                    ->openUrlInNewTab(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListAreaKerjas::route('/'),
            'create' => Pages\CreateAreaKerja::route('/create'),
            'edit' => Pages\EditAreaKerja::route('/{record}/edit'),
            'area' => Pages\GeomArea::route('/{record}/area')
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
