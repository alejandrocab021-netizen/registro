<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetentionUpdate extends Model
{
    /** @use HasFactory<\Database\Factories\DetentionUpdateFactory> */
    use HasFactory;

    protected $fillable = [
        'detention_id',
        'autoridad_receptora',
        'fecha_hora_recepcion',
        'domicilio_autoridad',
        'numero_carpeta',
        'delito_o_falta',
        'datos_persona_snapshot',
        'salud',
        'ruta_traslado',
        'responsable_custodia',
        'fase',
        'created_by',
    ];

    protected $casts = [
        'fecha_hora_recepcion' => 'datetime',
        'datos_persona_snapshot' => 'array',
        'salud' => 'array',
        'ruta_traslado' => 'array',
    ];

    public function detention(): BelongsTo
    {
        return $this->belongsTo(Detention::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
