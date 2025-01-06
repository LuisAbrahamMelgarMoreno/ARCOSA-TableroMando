<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolPermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rol_permisos')->insert([
            [
                'id_rol'=>1,
                'id_permiso'=>1
            ],
            [
                'id_rol'=>2,
                'id_permiso'=>2
            ],
            [
                'id_rol'=>2,
                'id_permiso'=>3
            ],
            [
                'id_rol'=>2,
                'id_permiso'=>4
            ],
            [
                'id_rol'=>2,
                'id_permiso'=>5
            ],
            [
                'id_rol'=>3,
                'id_permiso'=>2
            ],
            [
                'id_rol'=>3,
                'id_permiso'=>3
            ],
            [
                'id_rol'=>3,
                'id_permiso'=>4
            ],
        ]);

    }
}
