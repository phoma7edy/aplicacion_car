<?php
namespace App\Exports;

use App\Models\Vehiculos;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VehiculosExport implements FromArray, WithHeadings
{
    protected $vehiculos = [];

    public function __construct()
    {
        $this->vehiculos = Vehiculos::all()->map(function ($v) {
            return [
                $v->nombre,
                $v->modelo,
                $v->marca,
                $v->imagen_url,
                $v->descripcion,
                $v->placa,
                $v->color,
                $v->estado,
                $v->nomCategoria,
            ];
        })->toArray();
    }

    public function array(): array
    {
        return $this->vehiculos;
    }

    public function headings(): array
    {
        return [
            'Nombre',
            'Modelo',
            'Marca',
            'Imagen',
            'Descripción',
            'Placa',
            'Color',
            'Estado',
            'Categoría',
        ];
    }
}
