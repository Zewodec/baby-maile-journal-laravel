<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Zrostanya>
 */
class ZrostanyaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'child_id' => 1,
            'user_id' => 1,
            'datetime' => $this->faker->dateTime(),
            'length' => $this->faker->randomFloat(2, 40, 100),
            'weight' => $this->faker->randomFloat(2, 5, 100),
        ];
    }
}
