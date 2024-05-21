<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Parents>
 */
class ParentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'parent_1_image' => 'parent_images/parent-avatar.png',
            'parent_1_first_name' => $this->faker->firstName,
            'parent_1_last_name' => $this->faker->lastName,
            'parent_2_image' => 'parent_images/parent-avatar.png',
            'parent_2_first_name' => $this->faker->firstName,
            'parent_2_last_name' => $this->faker->lastName,
            'user_id' => 1,
        ];
    }
}
