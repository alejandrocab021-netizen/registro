<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detention_updates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('detention_id')->constrained()->cascadeOnDelete();
            $table->string('autoridad_receptora');
            $table->timestampTz('fecha_hora_recepcion');
            $table->string('domicilio_autoridad')->nullable();
            $table->string('numero_carpeta')->nullable();
            $table->string('delito_o_falta')->nullable();
            $table->json('datos_persona_snapshot');
            $table->json('salud')->nullable();
            $table->json('ruta_traslado')->nullable();
            $table->string('responsable_custodia')->nullable();
            $table->enum('fase', ['inicial', 'conclusion_36', 'conclusion_48']);
            $table->foreignId('created_by')->constrained('users');
            $table->timestampsTz();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detention_updates');
    }
};
