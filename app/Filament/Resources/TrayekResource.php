<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TrayekResource\Pages;
use App\Filament\Resources\TrayekResource\RelationManagers;
use App\Models\AreaKerja;
use App\Models\Trayek;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TrayekResource extends Resource
{
    protected static ?string $model = Trayek::class;

    protected static ?string $navigationLabel = 'Trayek';
    protected static ?string $navigationGroup = 'DATA';
    protected static ?string $navigationIcon = 'heroicon-o-chevron-double-right';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_trayek')
                    ->required(),
                Forms\Components\TextInput::make('harga_basis')
                    ->numeric()
                    ->mask(
                        fn (TextInput\Mask $mask) => $mask
                            ->numeric()
                            ->thousandsSeparator('.'),
                    )
                    ->required(),
                Forms\Components\Select::make('id_area_tujuan')
                    ->label('Kota Tujuan')
                    ->options(function ($get) {
                        $area = AreaKerja::where('id', '!=', $get('id_area_asal'))->get();
                        return $area->pluck('kabupatenKota.nama_kab_kota', 'id');
                    })
                    ->searchable()
                    ->required(),

                Forms\Components\Select::make('id_area_asal')
                    ->label('Kota Keberangkatan')
                    ->options(AreaKerja::all()->pluck('kabupatenKota.nama_kab_kota', 'id'))
                    ->searchable()
                    ->required()
                    ->reactive(),
                Repeater::make('area_persinggahan')
                    ->schema([
                        Forms\Components\Select::make('area_persinggahan')
                            ->label('Pilih Kota Persinggahan')
                            ->helperText('Pilih area persinggahan lain dalam menerima penumpang')
                            ->options(AreaKerja::all()->pluck('kabupatenKota.nama_kab_kota', 'id'))
                            ->searchable(),
                        Forms\Components\TextInput::make('tk_biaya')
                            ->label('Tambah / Kurang Biaya')
                            ->helperText('Berikan tanda "-" (minus) untuk pengurangan biaya, contoh: -20.000.')
                            ->default(0)
                            ->numeric()
                            ->mask(
                                fn (TextInput\Mask $mask) => $mask
                                    ->numeric()
                                    ->thousandsSeparator('.'),
                            ),
                    ])->columns(2)->createItemButtonLabel('+ Kota Persinggahan'),

            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_trayek'),
                Tables\Columns\TextColumn::make('areaAsal.kabupatenKota.nama_kab_kota')
                    ->label('Keberangkatan'),
                Tables\Columns\TextColumn::make('areaTujuan.kabupatenKota.nama_kab_kota')
                    ->label('Tujuan'),
                Tables\Columns\TextColumn::make('harga_basis'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListTrayeks::route('/'),
            'create' => Pages\CreateTrayek::route('/create'),
            'edit' => Pages\EditTrayek::route('/{record}/edit'),
        ];
    }
}
