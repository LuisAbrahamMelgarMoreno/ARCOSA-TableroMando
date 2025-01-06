<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogoPlantaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('catalogo_plantas')->insert([
            [
                'nombre'=>'Iztapalapa',
                'descripcion' => 'Iztapalapa'
            ],
            [
                'nombre'=>'Juquila',
                'descripcion'=>'Juquila'
            ],
            [
                'nombre'=>'Merida',
                'descripcion'=>'Merida'
            ],
            [
                'nombre'=>'Tepotzotlan',
                'descripcion'=>'Tepotzotlan'
            ]
        ]);
    }
}
