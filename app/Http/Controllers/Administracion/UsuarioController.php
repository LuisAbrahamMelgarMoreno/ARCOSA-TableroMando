<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Models\Administracion\CatalogoPlanta;
use App\Models\Administracion\MultiPlanta;
use App\Models\Administracion\Rol;
use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function obtenerUsuarios(){
        $usuarios =  User::whereNotIn('id',[1])->get();
        foreach ($usuarios as $usuario){
            $usuario->rol_nombre = $usuario->rol->nombre;
            $usuario->planta_nombre = $usuario->planta->nombre;
            $usuario->plantas_ids = [];
            if($usuario->multi_planta){
                $usuario->plantas_ids = MultiPlanta::where('id_usuario',$usuario->id)->pluck('id_planta')->toArray();
            }
        }
        return $usuarios;
    }

    public function obtenerDatos(){
        return response()->json([
            'roles' =>  Rol::whereNotIn('id',[1])->get(),
            'plantas' => CatalogoPlanta::where('activo',true)->get()
        ]);
    }

    public function crearUsuario(Request $request)
    {
        $plantas = [];
        if ($request->multi_planta) {
            $plantaId = $request->plantaSeleccionada;
            $plantas = $request->id_planta;
            if (!in_array($plantaId, $plantas)) {
                $plantas[] = $plantaId;
            }
        } else {
            $plantaId = $request->id_planta;
        }
        $usuario = User::create([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'id_planta' => $plantaId,
            'multi_planta' => $request->multi_planta,
            'id_rol'=>$request->id_rol,
            'password' => bcrypt($request->password),
        ]);
        if($request->multi_planta){
            $this->crearMultiPlanta($plantas,$usuario->id);
        }
        return true;
    }

    public function editarUsuario(Request $request)
    {
        $usuario = User::find($request->id);
        $plantaId = $request->multi_planta ? $request->plantaSeleccionada : $request->id_planta;
        if ($request->multi_planta) {
            $plantas = $request->id_planta;
            if (!in_array($plantaId, $plantas)) {
                $plantas[] = $plantaId;
            }
            if ($usuario->multi_planta) {
                $plantasMulti = MultiPlanta::where('id_usuario', $usuario->id)->pluck('id_planta')->toArray();
                if (!empty(array_diff($plantasMulti, $plantas)) || !empty(array_diff($plantas, $plantasMulti))) {
                    MultiPlanta::where('id_usuario',$usuario->id)->delete();
                    $this->crearMultiPlanta($plantas, $usuario->id);
                }
            } else {
                $this->crearMultiPlanta($plantas, $usuario->id);
            }
        } else {
            if ($usuario->multi_planta) {
                MultiPlanta::where('id_usuario',$usuario->id)->delete();
            }
        }
        $usuario->id_planta = $plantaId;
        $usuario->multi_planta = $request->multi_planta;
        $usuario->nombre = $request->nombre;
        $usuario->correo = $request->correo;
        $usuario->id_rol = $request->id_rol;
        $usuario->activo = $request->activo;
        if($request->cambioPassword){
            $usuario->password = bcrypt($request->password);
        }
        $usuario->save();
        return true;
    }

    protected function crearMultiPlanta($plantas, $id_usuario)
    {
        foreach ($plantas as $planta) {
            MultiPlanta::create([
                'id_usuario' => $id_usuario,
                'id_planta' => $planta
            ]);
        }
    }

}
