<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Progulyanka>
 */
class ProgulyankaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'time' => $this->faker->time(),
            'date' => $this->faker->date(),
            'user_id' => 1,
            'child_id' => 1,
        ];
    }
}
