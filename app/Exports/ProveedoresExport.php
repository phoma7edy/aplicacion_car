<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Proveedores;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProveedoresExport implements FromArray, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $proveedores = [];

    public function __construct()
    {
        $this->proveedores = Proveedores::all()->map(function ($p) {
            return [
                $p->nombre,
                $p->nit,
                $p->direccion,
                $p->telefono,
                $p->correo,
            ];
        })->toArray();
    }

    public function array(): array
    {
        return $this->proveedores;
    }

    public function headings(): array
    {
        return [
            'Nombre',
            'NIT',
            'Dirección',
            'Teléfono',
            'Correo',
        ];
    }
}