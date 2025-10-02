<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detentions', function (Blueprint $table) {
            $table->id();
            $table->string('nrd')->unique();
            $table->foreignId('person_id')->constrained('persons');
            $table->timestampTz('fecha_hora_detencion');
            $table->string('lugar_detencion');
            $table->enum('motivo_tipo', ['delito', 'falta']);
            $table->enum('modalidad', [
                'flagrancia',
                'orden_aprehension',
                'reaprehension',
                'extradicion_pasiva',
                'reclusion',
                'arraigo',
                'caso_urgente',
                'arresto_admin',
            ]);
            $table->string('numero_causa_o_exp')->nullable();
            $table->json('aprehensores')->nullable();
            $table->boolean('lesiones_visibles')->default(false);
            $table->string('autoridad_destino');
            $table->string('contacto_confianza')->nullable();
            $table->string('telefono_confianza')->nullable();
            $table->enum('estatus', ['activo', 'concluido', 'liberado', 'cerrado_sistema'])->default('activo');
            $table->timestampTz('puesto_a_disposicion_at')->nullable();
            $table->timestampsTz();
            $table->index(['estatus', 'fecha_hora_detencion']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detentions');
    }
};
