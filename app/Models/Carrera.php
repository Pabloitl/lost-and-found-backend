<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;

    protected $table = 'Carrera';

    const CREATED_AT = 'fechaCreacion';
    const UPDATED_AT = 'fechaActualizacion';

    protected $primaryKey = 'pkCarrera';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
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

    public function usuarios()
    {
        return $this->hasMany(User::class, 'fkCarrera', 'pkCarrera');
    }
}
