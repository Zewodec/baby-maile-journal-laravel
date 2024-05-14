<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Poshtovhs>
 */
class PoshtovhsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $ses_id = uniqid();
        return [
            'user_id' => 1,
            'child_id' => 1,
            'time' => $this->faker->time(),
            'date' => $this->faker->date(),
            'session_id' => $ses_id,
        ];
    }
}
