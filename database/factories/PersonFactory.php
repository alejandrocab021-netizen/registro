<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Person>
 */
class PersonFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->firstName(),
            'apellido_paterno' => $this->faker->lastName(),
            'apellido_materno' => $this->faker->optional()->lastName(),
            'fecha_nacimiento' => $this->faker->optional()->date(),
            'entidad_nacimiento' => $this->faker->optional()->state(),
            'nacionalidad' => 'Mexicana',
            'sexo' => $this->faker->randomElement(['M', 'F', 'X']),
            'curp' => strtoupper($this->faker->bothify('????########????##')),
            'lengua_nativa' => $this->faker->optional()->randomElement(['Español', 'Náhuatl', 'Maya']),
            'domicilio' => $this->faker->optional()->address(),
            'estado_civil' => $this->faker->optional()->randomElement(['soltero', 'casado', 'union libre']),
            'escolaridad' => $this->faker->optional()->randomElement(['Primaria', 'Secundaria', 'Licenciatura']),
            'ocupacion' => $this->faker->optional()->jobTitle(),
            'grupo_etnico' => $this->faker->optional()->randomElement(['Náhuatl', 'Maya', 'Mixteco']),
        ];
    }
}
