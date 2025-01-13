<?php

namespace App\Models\Administracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicador extends Model
{
    use HasFactory;
    protected $table = 'indicadores';

    protected $fillable = [
        'nombre',
        'descripcion',
        'minimo',
        'aceptable',
        'excelente',
        'id_catalogo_proceso',
        'id_catalogo_tendencia',
        'id_catalogo_planta'
    ];

    public function proceso()
    {
        return $this->belongsTo(CatalogoProceso::class, 'id_catalogo_proceso');
    }

    public function tendencia(){
        return $this->belongsTo(CatalogoTendencia::class, 'id_catalogo_tendencia');
    }

    public function planta(){
        return $this->belongsTo(CatalogoPlanta::class, 'id_catalogo_planta');
    }
}
