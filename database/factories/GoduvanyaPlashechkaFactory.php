<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GoduvanyaPlashechka>
 */
class GoduvanyaPlashechkaFactory extends Factory
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
            'plashechka_type' => $this->faker->word,
            'plashechka_amount' => $this->faker->randomNumber(),
            'plashechka_time' => $this->faker->time(),
            'goduvanya_type' => "plashechka",
            'user_id' => 1,
            'child_id' => 1,
        ];
    }
}
