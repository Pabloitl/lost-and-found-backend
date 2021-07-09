<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;

    protected $table = 'Ciudad';

    const CREATED_AT = 'fechaCreacion';
    const UPDATED_AT = 'fechaActualizacion';

    protected $primaryKey = 'pkCiudad';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'entidadFederativa',
        'usuarioCreacion',
        'usuarioActualizacion',
        'borrado',
        'fechaBorrado',
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

    public function campuses()
    {
        return $this->hasMany(Campus::class, 'fkCiudad', 'pkCiudad');
    }
}
