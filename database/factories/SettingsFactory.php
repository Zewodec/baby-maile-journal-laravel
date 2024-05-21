<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Settings>
 */
class SettingsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $date = Carbon::parse($this->faker->date());
        $start_last_menstruation = $date;
        $pology_date = $date->subMonth(3)->addDays(7);
        $alusherskiy_termin = $date->addDays(280);
        $data_zachatya = $date->subDays(14);

        return [
            'user_id' => 1,
            'child_id' => 1,
            'start_last_menstruation' => $start_last_menstruation,
            'pology_date' => $pology_date,
            'alusherskiy_termin' => $alusherskiy_termin,
            'data_zachatya' => $data_zachatya,
        ];
    }
}
