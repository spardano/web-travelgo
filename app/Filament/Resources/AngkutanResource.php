<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AngkutanResource\Pages;
use App\Models\Angkutan;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Illuminate\Database\Eloquent\Collection;

class AngkutanResource extends Resource
{
    protected static ?string $model = Angkutan::class;

    protected static ?string $navigationGroup = 'DATA';
    protected static ?string $navigationLabel = 'Angkutan';
    protected static ?string $navigationIcon = 'heroicon-o-truck';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_angkutan')
                    ->required()
                    ->maxLength(255),
                Select::make('jenis_angkutan')
                    ->options([
                        'SUV' => 'SUV',
                        'MPV' => 'MPV',
                        'Crossover' => 'Crossover',
                        'HatchBack' => 'HatchBack',
                        'Sedan' => 'Sedan',
                        'Sport' => 'Sport',
                        'Mini Bus' => 'Mini Bus',
                    ]),
                Forms\Components\TextInput::make('merek_kendaraan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nomor_kendaraan')
                    ->required()
                    ->maxLength(255),
                SpatieMediaLibraryFileUpload::make('foto_kendaraan')
                    ->required()
                    ->collection('foto_kendaraan'),
                SpatieMediaLibraryFileUpload::make('stnk')
                    ->collection('foto_stnk'),
                SpatieMediaLibraryFileUpload::make('buku_uji_kendaraan')
                    ->collection('buku_uji_kendaraan'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('foto_kendaraan')->collection('foto_kendaraan'),
                Tables\Columns\TextColumn::make('nama_angkutan'),
                Tables\Columns\TextColumn::make('jenis_angkutan'),
                Tables\Columns\TextColumn::make('merek_kendaraan'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make('Bangku')
                    ->color('blue')
                    ->icon('heroicon-s-collection')
                    ->action(function (Collection $records, array $data): void {
                    })
                    ->modalContent(
                        function ($record) {
                            $data['id'] = $record->id;
                            return view('modal.seat-modal', $data);
                        }
                    ),
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

    public function handleCustomAction($record)
    {
        return view('modal.seat-modal');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAngkutans::route('/'),
            'create' => Pages\CreateAngkutan::route('/create'),
            'edit' => Pages\EditAngkutan::route('/{record}/edit'),
        ];
    }
}
