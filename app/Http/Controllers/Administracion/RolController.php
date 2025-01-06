<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Models\Administracion\Permiso;
use App\Models\Administracion\Rol;
use App\Models\Administracion\RolPermiso;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function obtenerRoles()
    {
        $roles = Rol::whereNotIn('id', [1])->get();
        foreach ($roles as $rol){
            $p = RolPermiso::where('id_rol',$rol->id)->pluck('id_permiso');
            $rol->permisos = Permiso::whereIn('id',$p)->get();
        }
        return $roles;
    }

    public function obtenerDatos(){
        $permisos = Permiso::whereNotIn('id', [1])->where('activo',true)->get();
        $permisosAgrupados = $permisos->groupBy('subject');
        $resultadoFinal = [];
        foreach ($permisosAgrupados as $subject => $permisos) {
            $acciones = $permisos->select('action','id');
            $resultadoFinal[] = (object)[
                'subject' => $subject,
                'actions' => $acciones
            ];
        }

        return response()->json([
            'permisos' => $resultadoFinal
        ]);
    }

    public function crearRol(Request $request){
        $request->validate([
            'nombre'=>'required|string',
            'descripcion'=>'string',
            'permisos'=>'required|array|min:1'
        ]);
        $rol = Rol::create([
            'nombre'=>$request->nombre,
            'descripcion'=>$request->descripcion
        ]);

        foreach ($request->permisos as $permisoId ){
            RolPermiso::create([
                'id_rol'=>$rol->id,
                'id_permiso'=>$permisoId
            ]);
        }
        return true;
    }


    public function editarRol(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'string',
            'permisos' => 'required|array|min:1',
            'id' => 'required|integer'
        ]);
        $rol = Rol::find($request->id);
        $rol->nombre = $request->nombre;
        $rol->descripcion = $request->descripcion;
        $rolPermisos = RolPermiso::where('id_rol',$rol->id)->get();
        foreach ($rolPermisos as $rolPermiso){
            $rolPermiso->delete();
        }
        foreach ($request->permisos as $permisoId){
            RolPermiso::create([
                'id_rol' => $rol->id,
                'id_permiso' => $permisoId
            ]);
        }
        $rol->save();
        return true;
    }
}
