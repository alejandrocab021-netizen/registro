<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido_paterno');
            $table->string('apellido_materno')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('entidad_nacimiento')->nullable();
            $table->string('nacionalidad')->nullable();
            $table->enum('sexo', ['M', 'F', 'X'])->nullable();
            $table->string('curp', 18)->nullable()->index();
            $table->string('lengua_nativa')->nullable();
            $table->string('domicilio')->nullable();
            $table->string('estado_civil')->nullable();
            $table->string('escolaridad')->nullable();
            $table->string('ocupacion')->nullable();
            $table->string('grupo_etnico')->nullable();
            $table->timestampsTz();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('persons');
    }
};
