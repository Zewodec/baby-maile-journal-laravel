<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pidguznik>
 */
class PidguznikFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = ['wet', 'dirty', 'mixed', 'dry'];

        return [
            'user_id' => 1,
            'child_id' => 1,
            'datetime' => $this->faker->dateTime(),
            'type' => $types[$this->faker->numberBetween(0, 3)],
            'vologist' => $this->faker->numberBetween(0, 5),
            'kaka_color' => $this->faker->word(),
        ];
    }
}
