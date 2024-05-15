<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SymptomesZdorovyaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $symptomesZdorovya = [
            [
                'symptomes' => 'cough',
                'user_id' => 1,
                'child_id' => 1,
                'date' => '2024-05-15 22:52:33',
            ],
            [
                'symptomes' => 'fever',
                'user_id' => 1,
                'child_id' => 1,
                'date' => now(),
            ],
            [
                'symptomes' => 'headache',
                'user_id' => 1,
                'child_id' => 1,
                'date' => '2024-05-15 22:52:33',
            ],
        ];

        foreach ($symptomesZdorovya as $symptomes) {
            \App\Models\SymptomesZdorovya::factory()->create($symptomes);
        }
    }
}
