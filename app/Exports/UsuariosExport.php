<?php

namespace App\Exports;

use App\Models\Usuario;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsuariosExport implements FromArray, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $usuarios = [];
    public function __construct()
    {
        // Traemos usuarios con su persona y rol
        
        $this->usuarios = Usuario::with(['persona', 'rol'])->get()->map(function ($usuario) {
            return [
                $usuario->persona->ci ?? '',
                $usuario->persona->nombre . ' ' . $usuario->persona->paterno . ' ' . $usuario->persona->materno,
                $usuario->persona->correo ?? '',
                $usuario->persona->telefono ?? '',
                $usuario->rol->nombreRol ?? '',
                $usuario->persona->fechaRegistro ?? '',
                $usuario->nomUsuario ?? '',
            ];
        })->toArray();
    }

    public function array(): array
    {
        return $this->usuarios;
    }

    public function headings(): array
    {
        return [
            'CI',
            'Nombre Completo',
            'Correo',
            'Teléfono',
            'Rol',
            'Fecha de Registro',
            'Nombre Usuario',
        ];
    }
}
