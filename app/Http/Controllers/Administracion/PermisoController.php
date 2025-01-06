<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Models\Administracion\Permiso;
use Illuminate\Http\Request;

class PermisoController extends Controller
{

    public function obtenerPermisos()
    {
        return Permiso::whereNotIn('id',[1])->get();
    }

    public function crearPermiso(Request $request)
    {
        $request->validate([
            'action' => 'required|string',
            'subject'=> 'required|string',
            'description' => 'string'
        ]);
        Permiso::create([
            'action' => $request->action,
            'subject' => $request->subject,
            'description' => $request->description
        ]);
        return true;
    }

    public function editarPermiso(Request $request)
    {
        $request->validate([
            'action' => 'required|string',
            'subject' => 'required|string',
            'id' => 'required|integer',
            'description' => 'string',
            'activo' => 'required|boolean'
        ]);

        $permiso = Permiso::find($request->id);
        $permiso->action = $request->action;
        $permiso->subject = $request->subject;
        $permiso->description = $request->description;
        $permiso->activo = $request->activo;
        $permiso->save();
        return true;
    }
}
