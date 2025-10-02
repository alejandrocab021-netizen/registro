<?php

namespace Database\Factories;

use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Detention>
 */
class DetentionFactory extends Factory
{
    public function definition(): array
    {
        $detentionAt = $this->faker->dateTimeBetween('-2 days', 'now', 'UTC');

        return [
            'person_id' => Person::factory(),
            'nrd' => 'NRD-'.$this->faker->unique()->numerify('########').'-'.Str::upper(Str::random(4)),
            'fecha_hora_detencion' => $detentionAt,
            'lugar_detencion' => $this->faker->address(),
            'motivo_tipo' => $this->faker->randomElement(['delito', 'falta']),
            'modalidad' => $this->faker->randomElement([
                'flagrancia',
                'orden_aprehension',
                'reaprehension',
                'extradicion_pasiva',
                'reclusion',
                'arraigo',
                'caso_urgente',
                'arresto_admin',
            ]),
            'numero_causa_o_exp' => $this->faker->optional()->bothify('EXP-####/##'),
            'aprehensores' => [
                [
                    'nombre' => $this->faker->name(),
                    'institucion' => $this->faker->company(),
                    'cargo' => $this->faker->jobTitle(),
                    'grado' => $this->faker->randomElement(['Oficial', 'Inspector']),
                    'adscripcion' => $this->faker->city(),
                ],
            ],
            'lesiones_visibles' => $this->faker->boolean(),
            'autoridad_destino' => $this->faker->company(),
            'contacto_confianza' => $this->faker->optional()->name(),
            'telefono_confianza' => $this->faker->optional()->phoneNumber(),
            'estatus' => 'activo',
            'puesto_a_disposicion_at' => null,
        ];
    }
}
