<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Zcidjuvanya>
 */
class ZcidjuvanyaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'child_id' => 1,
            'date' => fake()->date(),
            'left_amount' => rand(0, 500),
            'right_amount' => rand(0, 500),
            'left_time' => '00:01:30',
            'right_time' => '00:01:10',
        ];
    }
}
