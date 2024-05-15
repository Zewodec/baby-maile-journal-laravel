<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TemperatureZdorovyaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $temperatureZdorovya = [
            [
                'temp' => 36.6,
                'user_id' => 1,
                'child_id' => 1,
                'date' => '2024-05-15 22:52:33',
            ],
            [
                'temp' => 37.2,
                'user_id' => 1,
                'child_id' => 1,
                'date' => now(),
            ],
            [
                'temp' => 36.6,
                'user_id' => 1,
                'child_id' => 1,
                'date' => '2024-05-15 22:52:33',
            ],
        ];

        foreach ($temperatureZdorovya as $temperature) {
            \App\Models\TemperatureZdorovya::factory()->create($temperature);
        }
    }
}
