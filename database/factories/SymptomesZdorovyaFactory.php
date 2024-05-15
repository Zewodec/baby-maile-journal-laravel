<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SymptomesZdorovya>
 */
class SymptomesZdorovyaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'symptomes' => $this->faker->word(),
            'user_id' => 1,
            'child_id' => 1,
            'date' => $this->faker->dateTime(),
        ];
    }
}
