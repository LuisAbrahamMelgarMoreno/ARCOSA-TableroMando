<?php

namespace App\Models\Administracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogoProceso extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'descripcion',
    ];
}
