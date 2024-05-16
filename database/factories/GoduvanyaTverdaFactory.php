<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GoduvanyaTverda>
 */
class GoduvanyaTverdaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * "datetime" => "2024-05-16T04:19"
     * "group1" => "Молочні продукти"
     * "group2" => "Злаки"
     * "group3" => "Інше"
     * "goduvanya_type" => "tverda"
     * "tverda_time" => "1.331"
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'datetime' => $this->faker->dateTime(),
            'group1' => $this->faker->word,
            'group2' => $this->faker->word,
            'group3' => $this->faker->word,
            'goduvanya_type' => 'tverda',
            'tverda_time' => $this->faker->time(),
            'user_id' => 1,
            'child_id' => 1,
        ];
    }
}
