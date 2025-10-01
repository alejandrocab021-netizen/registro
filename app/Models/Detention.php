<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Detention extends Model
{
    /** @use HasFactory<\Database\Factories\DetentionFactory> */
    use HasFactory;

    protected $fillable = [
        'nrd',
        'person_id',
        'fecha_hora_detencion',
        'lugar_detencion',
        'motivo_tipo',
        'modalidad',
        'numero_causa_o_exp',
        'aprehensores',
        'lesiones_visibles',
        'autoridad_destino',
        'contacto_confianza',
        'telefono_confianza',
        'estatus',
        'puesto_a_disposicion_at',
    ];

    protected $casts = [
        'fecha_hora_detencion' => 'datetime',
        'aprehensores' => 'array',
        'lesiones_visibles' => 'boolean',
        'puesto_a_disposicion_at' => 'datetime',
    ];

    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class);
    }

    public function updates(): HasMany
    {
        return $this->hasMany(DetentionUpdate::class);
    }
}
