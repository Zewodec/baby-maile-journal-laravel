<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChasGri>
 */
class ChasGriFactory extends Factory
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
            'activity' => $this->faker->word,
            'tracked_time' => $this->faker->time(),
            'datetime' => $this->faker->dateTime(),
        ];
    }
}
