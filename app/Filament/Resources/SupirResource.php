<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SupirResource\Pages;
use App\Filament\Resources\SupirResource\RelationManagers;
use App\Models\Supir;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SupirResource extends Resource
{
    protected static ?string $model = Supir::class;

    protected static ?string $navigationLabel = 'Sopir';
    protected static ?string $navigationGroup = 'Masters';
    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_supir')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nomor_ktp')
                    ->required()
                    ->maxLength(17),
                Forms\Components\TextInput::make('nomor_sim')
                    ->required()
                    ->maxLength(255),
                Select::make('jenis_sim')
                    ->options([
                        'SIM A' => 'SIM A',
                        'SIM B' => 'SIM B',
                        'SIM C' => 'SIM C',
                    ]),
                SpatieMediaLibraryFileUpload::make('foto_ktp')
                    ->collection('foto_ktp_sopir'),
                SpatieMediaLibraryFileUpload::make('foto_sim')
                    ->collection('foto_sim_sopir'),
                Forms\Components\Textarea::make('alamat')
                    ->required()
                    ->maxLength(65535),
                Forms\Components\TextInput::make('nomor_telp')
                    ->tel()
                    ->required()
                    ->maxLength(13)
                    ->minLength(9),
                Forms\Components\TextInput::make('nama_kontak_darurat')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nomor_darurat')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('tanggal_mulai_bekerja'),
                Toggle::make('status')
                    ->required()
                    ->inline(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_supir'),
                Tables\Columns\TextColumn::make('jenis_sim'),
                SpatieMediaLibraryImageColumn::make('foto_sim')->collection('foto_sim_sopir'),
                Tables\Columns\TextColumn::make('nomor_telp'),
                Tables\Columns\TextColumn::make('tanggal_mulai_bekerja')
                    ->date(),
                Tables\Columns\TextColumn::make('status'),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
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
            'index' => Pages\ListSupirs::route('/'),
            'create' => Pages\CreateSupir::route('/create'),
            'edit' => Pages\EditSupir::route('/{record}/edit'),
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
