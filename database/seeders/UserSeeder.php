<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'nombre'=>'Administrador',
                'correo'=>'a@a.com',
                'password'=>bcrypt(12345678),
                'id_planta'=>1,
                'id_rol'=>1,
                'multi_planta'=>false,
            ],
            [
                'nombre'=>'Demos',
                'correo'=>'d@d.com',
                'password'=>bcrypt(12345678),
                'id_planta'=>1,
                'id_rol'=>1,
                'multi_planta'=>false,
            ],
        ]);

    }
}
