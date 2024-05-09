<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VagitnistVaga>
 */
class VagitnistVagaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => fake()->date(),
            'vaga' => fake()->randomFloat(2, 50, 150),
            'week' => fake()->numberBetween(1, 52),
        ];
    }
}
