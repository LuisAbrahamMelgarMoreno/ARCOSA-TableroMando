<?php

namespace App\Http\Controllers;

use App\Models\Administracion\CatalogoPlanta;
use App\Models\Administracion\Permiso;
use App\Models\Administracion\RolPermiso;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function register(Request $request)
    {

        $request->validate([
            'nombre' => 'required|string',
            'correo' => 'required|string|unique:users',
            'password' => 'required|string',
            'c_password' => 'required|same:password',
//            'departamento_id' => 'required',
//            'planta_id' => 'required',
//            'multi_planta' => 'required|boolean'
        ]);
//        $plantaId = $request->multi_planta ? $request->plantaSeleccionada : $request->planta_id;
        //OBTENER UN ROL GENERAL PARA MOSTRARLO
        $user = new User([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'password' => bcrypt($request->password),
//            'departamento_id' => $request->departamento_id,
//            'planta_id' => $plantaId,
            'id_rol' => 2,
//            'multi_planta'=>$request->multi_planta
        ]);

        if ($user->save()) {
//            if($request->multi_planta){
//                $plantas = $request->planta_id;
//                if (!in_array($plantaId, $plantas)) {
//                    $plantas[] = $plantaId;
//                }
//                foreach ($plantas as $planta) {
//                    MultiPlanta::create([
//                        'usuario_id' => $user->id,
//                        'planta_id' => $planta
//                    ]);
//                }
//            }

            $listaIdsPermissions = RolPermiso::where('id_rol', $user->id_rol)->pluck('id_permiso');
            $permissions = Permiso::whereIn('id', $listaIdsPermissions)
                ->select('action', 'subject')->get();
            $permissions[] = (object)[
                'action' => 'read',
                'subject' => 'Auth'
            ];
            $user->role = $user->rol->nombre;
            // Crear el token personal de acceso
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'accessToken' => $token,
                'userData' => $user,
                'userAbilities' => $permissions,
            ]);
        } else {
            return response()->json(['error' => 'Provide proper details']);
        }


    }


    public function login(Request $request)
    {
        $request->validate([
            'correo' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);
        $credentials = request(['correo','password']);
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
        $user = User::where('correo',$request->correo)->first();
        $listaIdsPermissions = RolPermiso::where('id_rol', $user->id_rol)->pluck('id_permiso');
        $permissions = Permiso::whereIn('id', $listaIdsPermissions)
            ->select('action', 'subject')->get();
        $permissions[] = (object)[
            'action' => 'read',
            'subject' => 'Auth'
        ];
        $user->role = $user->rol->nombre;
        if($user->id === 1){
            $plantas = CatalogoPlanta::all();
        }else{
            $plantas = CatalogoPlanta::whereIn('id',$user->getIdsPlantas())->get();
        }
        // Crear el token personal de acceso
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'accessToken' => $token,
            'userData' => $user,
            'userAbilities' => $permissions,
            'plantas' => $plantas,
            'plantaSeleccionada' => $user->planta,
            //'maxAge' => 120,
        ]);
    }

    public function logout()
    {
        $user = auth()->user();
//        dd($request->all(),auth()->user(),'lol');

        $user->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
