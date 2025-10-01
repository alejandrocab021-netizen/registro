<?php

namespace Database\Factories;

use App\Models\Detention;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetentionUpdate>
 */
class DetentionUpdateFactory extends Factory
{
    public function definition(): array
    {
        $receivedAt = $this->faker->dateTimeBetween('-1 day', 'now', 'UTC');

        return [
            'detention_id' => Detention::factory(),
            'autoridad_receptora' => $this->faker->company(),
            'fecha_hora_recepcion' => $receivedAt,
            'domicilio_autoridad' => $this->faker->address(),
            'numero_carpeta' => $this->faker->optional()->bothify('CARP-####/##'),
            'delito_o_falta' => $this->faker->optional()->sentence(3),
            'datos_persona_snapshot' => [
                'domicilio' => $this->faker->address(),
                'curp' => strtoupper($this->faker->bothify('????########????##')),
            ],
            'salud' => [
                'adicciones' => $this->faker->optional()->words(2, true),
                'enfermedades' => $this->faker->optional()->words(2, true),
            ],
            'ruta_traslado' => $this->faker->optional()->words(3),
            'responsable_custodia' => $this->faker->name(),
            'fase' => $this->faker->randomElement(['inicial', 'conclusion_36', 'conclusion_48']),
            'created_by' => User::factory(),
        ];
    }
}
