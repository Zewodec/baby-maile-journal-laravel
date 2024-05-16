<?php

namespace Database\Seeders;

use App\Models\GoduvanyaGrudy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GoduvanyaGrudySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $amount = rand(1, 10);

        GoduvanyaGrudy::factory()->count($amount)->create();

        GoduvanyaGrudy::factory()->create([
            'datetime' => now(),
            'left_time' => '00:01:00',
            'right_time' => '00:00:40',
            'goduvanya_type' => 'grudy',
            'user_id' => 1,
            'child_id' => 1,
        ]);
    }
}
