<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Administracion\CatalogoPlanta;
use App\Models\Administracion\MultiPlanta;
use App\Models\Administracion\Rol;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'correo',
        'password',
        'id_planta',
        'id_rol',
        'multi_planta'
    ];

    protected $casts = [
        'multi_planta' => 'boolean',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'correo_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

//    public function departamento()
//    {
//        return $this->belongsTo(CatDepartamento::class,'departamento_id');
//    }

    public function planta()
    {
        return $this->belongsTo(CatalogoPlanta::class,'id_planta');
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class,'id_rol');
    }

    public function getIdsPlantas() {
        if ($this->multi_planta) {
            return MultiPlanta::where('id_usuario', $this->id)->pluck('id_planta')->toArray();
        } else {
            return [$this->id_planta];
        }
    }

    public function plantas(){
        if($this->multi_planta){
            return MultiPlanta::where('id_usuario',$this->id)->get();
        }else{
            return $this->planta();
        }
    }
}
