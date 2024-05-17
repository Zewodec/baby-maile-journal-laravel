<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use function Pest\Laravel\json;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CalendarEvents>
 */
class CalendarEventsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => $this->faker->date(),
            'text' => $this->faker->text(),
            'user_id' => 1,
            'child_id' => 1,
        ];
    }
}
