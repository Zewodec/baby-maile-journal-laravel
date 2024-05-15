<?php

namespace Database\Seeders;

use App\Models\Progulyanka;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgulyankaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $progulyankaCount = rand(2, 6);

        Progulyanka::factory()->count($progulyankaCount)->create([
            'user_id' => 1,
            'child_id' => 1,
        ]);


        Progulyanka::factory()->create([
            'user_id' => 1,
            'child_id' => 1,
            'time' => now(),
            'date' => now(),
        ]);
    }
}
