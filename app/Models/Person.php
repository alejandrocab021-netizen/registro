<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Person extends Model
{
    /** @use HasFactory<\Database\Factories\PersonFactory> */
    use HasFactory;

    protected $table = 'persons';

    protected $fillable = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'fecha_nacimiento',
        'entidad_nacimiento',
        'nacionalidad',
        'sexo',
        'curp',
        'lengua_nativa',
        'domicilio',
        'estado_civil',
        'escolaridad',
        'ocupacion',
        'grupo_etnico',
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
    ];

    public function detentions(): HasMany
    {
        return $this->hasMany(Detention::class);
    }
}
