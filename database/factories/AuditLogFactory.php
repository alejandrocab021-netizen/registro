<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AuditLog>
 */
class AuditLogFactory extends Factory
{
    public function definition(): array
    {
        return [
            'uuid' => Str::uuid()->toString(),
            'user_id' => User::factory(),
            'action' => $this->faker->randomElement(['created', 'updated', 'viewed', 'downloaded']),
            'model_type' => 'App\\Models\\Detention',
            'model_id' => $this->faker->numberBetween(1, 9999),
            'changes' => ['foo' => 'bar'],
            'ip' => $this->faker->ipv4(),
            'user_agent' => $this->faker->userAgent(),
        ];
    }
}
