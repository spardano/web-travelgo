<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JenisKelasResource\Pages;
use App\Filament\Resources\JenisKelasResource\RelationManagers;
use App\Models\JenisKelas;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JenisKelasResource extends Resource
{
    protected static ?string $model = JenisKelas::class;

    protected static ?string $navigationGroup = 'Masters';
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-list';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('namaKelas')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('penambahanBiaya'),
                Forms\Components\Textarea::make('deskripsi')
                    ->maxLength(65535),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('namaKelas'),
                Tables\Columns\TextColumn::make('penambahanBiaya'),
                Tables\Columns\TextColumn::make('deskripsi'),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageJenisKelas::route('/'),
        ];
    }
}
