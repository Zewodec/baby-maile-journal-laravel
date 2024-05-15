<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Son>
 */
class SonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "date" => $this->faker->date(),
            "time" => $this->faker->time(),
            "user_id" => 1,
            "child_id" => 1,
        ];
    }
}
