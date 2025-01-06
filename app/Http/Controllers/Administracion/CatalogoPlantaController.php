<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Models\Administracion\CatalogoPlanta;
use Illuminate\Http\Request;

class CatalogoPlantaController extends Controller
{

    public function obtenerCatalogoPlantas()
    {
        return CatalogoPlanta::all();
    }

    public function crearCatalogoPlanta(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'string'
        ]);

        CatalogoPlanta::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion
        ]);

        return true;
    }

    public function editarCatalogoPlanta(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'id' => 'required|integer',
            'activo' => 'required|boolean',
            'descripcion' => 'string',
        ]);
        $planta = CatalogoPlanta::find($request->id);
        $planta->descripcion = $request->descripcion;
        $planta->nombre = $request->nombre;
        $planta->activo = $request->activo;
        $planta->save();
        return true;
    }
}
