<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JadwalResource\Pages;
use App\Filament\Resources\JadwalResource\RelationManagers;
use App\Models\DetailBangku;
use App\Models\Jadwal;
use App\Models\Ticket;
use Filament\Forms;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Collection;

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
                Forms\Components\Select::make('id_trayek')
                    ->relationship('trayek', 'nama_trayek')
                    ->required(),
                Forms\Components\DateTimePicker::make('tgl_keberangkatan')
                    ->required(),
                Forms\Components\Select::make('id_jenis_kelas')
                    ->relationship('jenis_kelas', 'namaKelas'),
                Forms\Components\Select::make('id_supir')
                    ->relationship('supirs', 'nama_supir'),
                Forms\Components\Select::make('id_angkutan')
                    ->relationship('angkutan', 'nama_angkutan')
                    ->required(),
                Toggle::make('status')
                    ->required()
                    ->inline(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('trayek.nama_trayek'),
                Tables\Columns\TextColumn::make('angkutan.nama_angkutan'),
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
                Action::make('Kontrol Tiket')
                    ->color('blue')
                    ->icon('heroicon-s-ticket')
                    ->action(function (Collection $records, array $data): void {
                    })
                    ->modalContent(
                        function ($record) {
                            $data['id'] = $record->id;
                            return view('modal.tiket-modal', $data);
                        }
                    ),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()->before(function ($record) {
                    Ticket::where('id_jadwal', $record->id)->delete();
                })
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
