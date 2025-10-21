<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Proveedores;
use App\Models\Vehiculos;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function exportUsuarios()
    {
        $usuarios = Usuario::with(['persona', 'rol'])->get();        
        $pdf = Pdf::loadView('reports.usuarios', compact('usuarios'));
        return $pdf->download('reporte_usuarios.pdf');
    }
    
    public function exportProveedores()
    {
        $proveedores = Proveedores::all();
        $pdf = Pdf::loadView('reports.proveedores', compact('proveedores'));
        return $pdf->download('reporte_proveedores.pdf');
    }
    public function exportVehiculos()
    {
        $vehiculos = Vehiculos::all();
        $pdf = Pdf::loadView('reports.vehiculo', compact('vehiculos'));
        return $pdf->download('reporte_vehiculos.pdf');
    }
}

