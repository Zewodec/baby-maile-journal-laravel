<?php

namespace Database\Factories;

use App\Models\CalendarEvents;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CalendarImages>
 */
class CalendarImagesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'path' => "images/event.png",
            'calendar_events_id' => CalendarEvents::inRandomOrder()->first()->id,
        ];
    }
}
