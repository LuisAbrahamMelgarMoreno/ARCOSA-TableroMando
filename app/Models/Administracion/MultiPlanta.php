<?php

namespace App\Models\Administracion;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultiPlanta extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_planta',
        'id_usuario'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class,'id_usuario','id');
    }

    public function planta()
    {
        return $this->belongsTo(CatalogoPlanta::class,'id_planta','id');
    }
}
