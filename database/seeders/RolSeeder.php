<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rols')->insert([
            [
                'nombre'=>'admin',
                'descripcion'=>'Admin',
            ],
            [
                'nombre'=>'Demo 1',
                'descripcion'=>'Desmotracion',
            ],
            [
                'nombre'=>'Maquila',
                'descripcion'=>'Maquila',
            ],
        ]);
    }
}
