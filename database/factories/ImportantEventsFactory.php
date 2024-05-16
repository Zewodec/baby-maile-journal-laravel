<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ImportantEvents>
 */
class ImportantEventsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
//        'user_id',
//        'child_id',
//        'event_name',
//        'event_description',
//        'event_text',
//        'image',

        return [
            'user_id' => 1,
            'child_id' => 1,
            'event_name' => $this->faker->words(2, true),
            'event_description' => $this->faker->words(5, true),
            'event_text' => $this->faker->text,
            'image' => 'images/event.png',
        ];
    }
}
