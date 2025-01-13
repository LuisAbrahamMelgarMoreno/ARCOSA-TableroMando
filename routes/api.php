<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);
    Route::post('register', [\App\Http\Controllers\AuthController::class, 'register']);
});
Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::get('user', [\App\Http\Controllers\AuthController::class, 'user']);

    //USUARIOS
    Route::post('usuarios/obtenerUsuarios',[\App\Http\Controllers\Administracion\UsuarioController::class,'obtenerUsuarios']);
    Route::post('usuarios/obtenerDatos',[\App\Http\Controllers\Administracion\UsuarioController::class,'obtenerDatos']);
    Route::post('usuarios/crearUsuario',[\App\Http\Controllers\Administracion\UsuarioController::class,'crearUsuario']);
    Route::post('usuarios/editarUsuario',[\App\Http\Controllers\Administracion\UsuarioController::class,'editarUsuario']);

    //ROLES
    Route::post('roles/obtenerRoles',[\App\Http\Controllers\Administracion\RolController::class,'obtenerRoles']);
    Route::post('roles/obtenerDatos',[\App\Http\Controllers\Administracion\RolController::class,'obtenerDatos']);
    Route::post('roles/crearRol',[\App\Http\Controllers\Administracion\RolController::class,'crearRol']);
    Route::post('roles/editarRol',[\App\Http\Controllers\Administracion\RolController::class,'editarRol']);

    //PERMISOS
    Route::post('permisos/obtenerPermisos',[\App\Http\Controllers\Administracion\PermisoController::class,'obtenerPermisos']);
    Route::post('permisos/crearPermiso',[\App\Http\Controllers\Administracion\PermisoController::class,'crearPermiso']);
    Route::post('permisos/editarPermiso',[\App\Http\Controllers\Administracion\PermisoController::class,'editarPermiso']);

    //Catalogo Plantas
    Route::post('catalogoPlantas/obtenerCatalogoPlantas',[\App\Http\Controllers\Administracion\CatalogoPlantaController::class,'obtenerCatalogoPlantas']);
    Route::post('catalogoPlantas/crearCatalogoPlanta',[\App\Http\Controllers\Administracion\CatalogoPlantaController::class,'crearCatalogoPlanta']);
    Route::post('catalogoPlantas/editarCatalogoPlanta',[\App\Http\Controllers\Administracion\CatalogoPlantaController::class,'editarCatalogoPlanta']);

    //Catalogo Procesos
    Route::post('catalogoProceso/obtenerCatalogoProcesos', [\App\Http\Controllers\Administracion\CatalogoProcesoController::class, 'obtenerCatalogoProcesos']);
    Route::post('catalogoProceso/crearCatalogoProceso', [\App\Http\Controllers\Administracion\CatalogoProcesoController::class, 'crearCatalogoProceso']);
    Route::post('catalogoProceso/editarCatalogoProceso', [\App\Http\Controllers\Administracion\CatalogoProcesoController::class, 'editarCatalogoProceso']);
    Route::post('catalogoProceso/eliminarCatalogoProceso', [\App\Http\Controllers\Administracion\CatalogoProcesoController::class, 'eliminarCatalogoProceso']);

    //Catalogo Tendencias
    Route::post('catalogoTendencia/obtenerCatalogoTendencias', [\App\Http\Controllers\Administracion\CatalogoTendenciaController::class, 'obtenerCatalogoTendencias']);
    Route::post('catalogoTendencia/crearCatalogoTendencia',[\App\Http\Controllers\Administracion\CatalogoTendenciaController::class, 'crearCatalogoTendencia']);
    Route::post('catalogoTendencia/editarCatalogoTendencia', [\App\Http\Controllers\Administracion\CatalogoTendenciaController::class, 'editarCatalogoTendencia']);
    Route::post('catalogoTendencia/eliminarCatalogoTendencia', [\App\Http\Controllers\Administracion\CatalogoTendenciaController::class, 'eliminarCatalogoTendencia']);

    //Indicadores
    Route::post('indicadores/obtenerDatos', [\App\Http\Controllers\Administracion\IndicadorController::class, 'obtenerDatos']);
    Route::post('indicadores/obtenerIndicadores', [\App\Http\Controllers\Administracion\IndicadorController::class, 'obtenerIndicadores']);
    Route::post('indicadores/crearIndicador', [\App\Http\Controllers\Administracion\IndicadorController::class, 'crearIndicador']);
    Route::post('indicadores/editarIndicador', [\App\Http\Controllers\Administracion\IndicadorController::class, 'editarIndicador']);
    Route::post('indicadores/eliminarIndicador', [\App\Http\Controllers\Administracion\IndicadorController::class, 'eliminarIndicador']);

});
