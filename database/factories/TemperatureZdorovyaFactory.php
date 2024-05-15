<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TemperatureZdorovya>
 */
class TemperatureZdorovyaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'temp' => $this->faker->randomFloat(1, 35, 42),
            'user_id' => 1,
            'child_id' => 1,
            'date' => $this->faker->dateTime(),
        ];
    }
}
