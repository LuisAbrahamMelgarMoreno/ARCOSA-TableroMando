<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Models\Administracion\CatalogoPlanta;
use App\Models\Administracion\CatalogoProceso;
use App\Models\Administracion\CatalogoTendencia;
use App\Models\Administracion\Indicador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndicadorController extends Controller
{
    public function obtenerDatos(Request $request){
        $plantas = CatalogoPlanta::where('activo', '=', true)->get();
        $tendencias = CatalogoTendencia::where('activo', '=', true)->get();
        $procesos = CatalogoProceso::where('activo', '=', true)->get();

        return response()->json([
            'plantas' => $plantas,
            'tendencias' => $tendencias,
            'procesos' => $procesos
        ]);
    }

    public function obtenerIndicadores(Request $request){
        return response()->json(Indicador::with('planta', 'proceso', 'tendencia')->get());
    }

    public function crearIndicador(Request $request){
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'string',
            'minimo' => 'required|integer|min:0|max:100',
            'aceptable' => 'required|integer|min:0|max:100',
            'excelente' => 'required|integer|min:0|max:100',
            'id_catalogo_proceso' => 'required|integer',
            'id_catalogo_tendencia' => 'required|integer',
            'id_catalogo_planta' => 'required|integer',
        ]);
        try{
            if($request->minimo > $request->aceptable){
                throw new \Exception('El procentaje minimo no debe de superar al procxentaje aceptable');
            }

            if($request->aceptable > $request->excelente){
                throw new \Exception('El procentaje aceptable no debe de superar al procxentaje excelente');
            }

            DB::beginTransaction();
            $indicador = Indicador::create([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'minimo' => $request->minimo,
                'aceptable' => $request->aceptable,
                'excelente' => $request->excelente,
                'id_catalogo_proceso' => $request->id_catalogo_proceso,
                'id_catalogo_tendencia' => $request->id_catalogo_tendencia,
                'id_catalogo_planta' => $request->id_catalogo_planta,
            ]);
            DB::commit( );
            return $indicador;

        } catch (\Exception $e){
            return response()->json(['error' => 'Hubo un error al crear el indicador'], 500);
        }
    }

    public function editarIndicador(Request $request){
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'string',
            'minimo' => 'required|integer|min:0|max:100',
            'aceptable' => 'required|integer|min:0|max:100',
            'excelente' => 'required|integer|min:0|max:100',
            'id_catalogo_proceso' => 'required|integer',
            'id_catalogo_tendencia' => 'required|integer',
            'id_catalogo_planta' => 'required|integer',
            'id' => 'integer|required',
            'activo' => 'boolean',
        ]);
        try{
            if($request->minimo > $request->aceptable){
                throw new \Exception('El procentaje minimo no debe de superar al procxentaje aceptable');
            }

            if($request->aceptable > $request->excelente){
                throw new \Exception('El procentaje aceptable no debe de superar al procxentaje excelente');
            }

            $indicador = Indicador::find($request->id);
            if(!$indicador){
                throw new \Exception('Indicador no encontrado');
            }

            DB::beginTransaction();
            $indicador->update([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'minimo' => $request->minimo,
                'aceptable' => $request->aceptable,
                'excelente' => $request->excelente,
                'id_catalogo_proceso' => $request->id_catalogo_proceso,
                'id_catalogo_tendencia' => $request->id_catalogo_tendencia,
                'id_catalogo_planta' => $request->id_catalogo_planta,
                'activo' => $request->activo
            ]);
            DB::commit( );
            return $indicador;

        } catch (\Exception $e){
            return response()->json(['error' => 'Hubo un error al crear el indicador'], 500);
        }
    }

    public function eliminarIndicador(Request $request){

    }


}
