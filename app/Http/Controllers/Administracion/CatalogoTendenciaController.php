<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Models\Administracion\CatalogoProceso;
use App\Models\Administracion\CatalogoTendencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatalogoTendenciaController extends Controller
{
    public function obtenerCatalogoTendencias(Request $request){
        return CatalogoTendencia::all();
    }

    public function crearCatalogoTendencia(Request $request){
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'string',
        ]);
        try {
            DB::beginTransaction();
            $catalogoTendencia = CatalogoTendencia::create([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion
            ]);
            DB::commit();
            return $catalogoTendencia;
        } catch (\Exception $e){
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function editarCatalogoTendencia(Request $request){
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'string',
            'id' => 'required|integer',
            'activo' => 'required|boolean'
        ]);

        try{
            $catalogoTendencia = CatalogoTendencia::find($request->id);
            if(!$catalogoTendencia){
                throw new \Exception('No existe el catalogo de proceso');
            }
            DB::beginTransaction();
            $catalogoTendencia->nombre = $request->nombre;
            $catalogoTendencia->descripcion = $request->descripcion;
            $catalogoTendencia->activo = $request->activo;
            $catalogoTendencia->save();
            DB::commit();
            return $catalogoTendencia;
        } catch(\Exception $e){
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function eliminarCatalogoTendencia(Request $request){
        $request->validate([
            'id' => 'required|integer'
        ]);
        try{
            DB::beginTransaction();
            $catalogoTendencia = CatalogoTendencia::find($request->id);
            if(!$catalogoTendencia){
                throw new \Exception('No existe el catalogo de proceso');
            }
            $catalogoTendencia->delete();
            DB::commit();
            return $catalogoTendencia;
        } catch(\Exception $e){
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
