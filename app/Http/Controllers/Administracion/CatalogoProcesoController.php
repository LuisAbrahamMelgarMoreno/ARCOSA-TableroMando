<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Models\Administracion\CatalogoProceso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class CatalogoProcesoController extends Controller
{
    public function obtenerCatalogoProcesos(Request $request){
        return CatalogoProceso::all();
    }

    public function crearCatalogoProceso(Request $request){
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'string',
        ]);
        try {
            DB::beginTransaction();
            $catalogoProceso = CatalogoProceso::create([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion
            ]);
            DB::commit();
            return $catalogoProceso;
        } catch (\Exception $e){
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function editarCatalogoProceso(Request $request){
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'string',
            'id' => 'required|integer'
        ]);

       try{
           $catalogoProceso = CatalogoProceso::find($request->id);
           if(!$catalogoProceso){
               throw new \Exception('No existe el catalogo de proceso');
           }
           DB::beginTransaction();
           $catalogoProceso->nombre = $request->nombre;
           $catalogoProceso->descripcion = $request->descripcion;
           $catalogoProceso->save();
           DB::commit();
           return $catalogoProceso;
       } catch(\Exception $e){
           DB::rollBack();
           return response()->json(['error' => $e->getMessage()], 500);
       }
    }

    public function eliminarCatalogoProceso(Request $request){
        $request->validate([
            'id' => 'required|integer'
        ]);

//        try{
//            DB::beginTransaction();
////            $catalogoProceso = CatalogoP
//        }
    }
}
