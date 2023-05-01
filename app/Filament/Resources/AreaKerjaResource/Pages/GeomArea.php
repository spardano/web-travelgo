<?php

namespace App\Filament\Resources\AreaKerjaResource\Pages;

use App\Filament\Resources\AreaKerjaResource;
use App\Models\AreaKerja;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class GeomArea extends Page
{
    protected static string $resource = AreaKerjaResource::class;

    protected static string $view = 'filament.resources.area-kerja-resource.pages.geom-area';

    public $listeners = ['changeGeometri'];
    public $data;
    public $id_area;
    public $geometri;

    public function mount()
    {
        $this->id_area = Request::segment(3);
        $this->data = AreaKerja::find($this->id_area);
    }

    public function saveLocation()
    {
        // $updateGeom = AreaKerja::where('id', $this->id_area)->update([
        //     'geometri_number' => $this->geometri
        // ]);

        try {
            DB::select("UPDATE area_kerjas SET geometri_number = ST_GeomFromGeoJSON(?), updated_at = NOW() WHERE id = ? ", [$this->geometri, $this->id_area]);
            session()->flash('success', 'Berhasil menyimpan area kerja');
        } catch (\Exception $exception) {
            session()->flash('failed', 'Gagal menyimpan area kerja');
        }
    }

    public function changeGeometri($val)
    {
        $this->geometri = $val;
    }
}
