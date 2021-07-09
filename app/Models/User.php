<?php

namespace App\Models;

/* use Illuminate\Contracts\Auth\MustVerifyEmail; */
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'Usuario';

    const CREATED_AT = 'fechaCreacion';
    const UPDATED_AT = 'fechaActualizacion';

    protected $primaryKey = 'pkUsuario';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'apellido',
        'fotoDePerfil',
        'correoElectronico',
        'contrasena',
        'nombreDeUsuario',
        'usuarioCreacion',
        'usuarioActualizacion',
        'borrado',
        'fechaBorrado',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'fechaCreacion' => 'datetime',
        'fechaActualizacion' => 'datetime',
        'fechaBorrado' => 'datetime',
    ];

    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'fkCarrera', 'pkCarrera');
    }

    public function campus()
    {
        return $this->belongsTo(Campus::class, 'fkCampus', 'pkCampus');
    }
}
