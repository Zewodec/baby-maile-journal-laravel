<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GoduvanyaGrudy>
 */
class GoduvanyaGrudyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'datetime' => $this->faker->dateTime(),
            'left_time' => $this->faker->time(),
            'right_time' => $this->faker->time(),
            'goduvanya_type' => 'grudy',
            'user_id' => 1,
            'child_id' => 1,
        ];
    }
}
