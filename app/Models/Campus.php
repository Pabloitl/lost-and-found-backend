<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    use HasFactory;

    protected $table = 'Campus';

    const CREATED_AT = 'fechaCreacion';
    const UPDATED_AT = 'fechaActualizacion';

    protected $primaryKey = 'pkCampus';
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

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class, 'fkCiudad', 'pkCiudad');
    }

    public function usuarios()
    {
        return $this->hasMany(User::class, 'fkCampus', 'pkCampus');
    }
}
