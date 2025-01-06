<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermisosSedeer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $acciones = [
            'leer',
            'crear',
            'editar',
            'eliminar'
        ];
        $sujetos = [
            'Usuario',
            'Permisos',
            'Rol',
            'Catalogo Planta',
        ];
        $datos = [];
        foreach($sujetos as $sujeto){
            foreach ($acciones as $accion){
                $datos[] = [
                    'subject'=>$sujeto,
                    'action'=>$accion,
                    'description'=>"Tiene el permiso de ".$accion." en ".$sujeto
                ];
            }
        }
        DB::table('permisos')->insert([
            'subject'=>'all',
            'action' => 'manage'
        ]);
        DB::table('permisos')->insert($datos);
    }
}
