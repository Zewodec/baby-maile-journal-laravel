<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LikyZdorovyaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $likyZdorovya = [
            [
                'type' => 'liky',
                'liky_vacine' => 'paracetamol',
                'user_id' => 1,
                'child_id' => 1,
                'date' => '2024-05-15 22:52:33',
            ],
            [
                'type' => 'liky',
                'liky_vacine' => 'ibuprofen',
                'user_id' => 1,
                'child_id' => 1,
                'date' => '2024-05-15 22:52:33',
            ],
            [
                'type' => 'liky',
                'liky_vacine' => 'aspirin',
                'user_id' => 1,
                'child_id' => 1,
                'date' => '2024-05-15 22:52:33',
            ],
        ];

        foreach ($likyZdorovya as $liky) {
            \App\Models\LikyZdorovya::factory()->create($liky);
        }
    }
}
