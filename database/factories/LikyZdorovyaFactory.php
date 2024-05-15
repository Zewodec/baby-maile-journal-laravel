<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LikyZdorovya>
 */
class LikyZdorovyaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = ['liky', 'vacine'];

        return [
            'type' => $types[$this->faker->numberBetween(0, 1)],
            'liky_vacine' => $this->faker->word(),
            'user_id' => 1,
            'child_id' => 1,
            'date' => $this->faker->dateTime(),
        ];
    }
}
