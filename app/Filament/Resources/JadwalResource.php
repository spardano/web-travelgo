<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JadwalResource\Pages;
use App\Filament\Resources\JadwalResource\RelationManagers;
use App\Models\Jadwal;
use Filament\Forms;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JadwalResource extends Resource
{
    protected static ?string $model = Jadwal::class;

    protected static ?string $navigationGroup = 'DATA';
    protected static ?string $navigationLabel = 'Jadwal';
    protected static ?string $navigationIcon = 'heroicon-o-clock';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_trayek')
                    ->required(),
                Forms\Components\DateTimePicker::make('tgl_keberangkatan')
                    ->required(),
                Forms\Components\Select::make('id_jenis_kelas')
                    ->relationship('jenis_kelas', 'namaKelas'),
                Forms\Components\Select::make('id_supir')
                    ->relationship('supirs', 'nama_supir'),
                Toggle::make('status')
                    ->required()
                    ->inline(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_trayek'),
                Tables\Columns\TextColumn::make('tgl_keberangkatan')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('jenis_kelas.namaKelas'),
                Tables\Columns\TextColumn::make('supirs.nama_supir'),
                BadgeColumn::make('status')
                    ->enum([
                        0 => 'Non Aktif',
                        1 => 'Aktif',
                    ])
                    ->colors([
                        'success' => 1,
                        'danger' => 0,
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
            'index' => Pages\ListJadwals::route('/'),
            'create' => Pages\CreateJadwal::route('/create'),
            'edit' => Pages\EditJadwal::route('/{record}/edit'),
        ];
    }
}
