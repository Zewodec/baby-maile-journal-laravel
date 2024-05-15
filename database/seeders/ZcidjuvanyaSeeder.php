<?php

namespace Database\Seeders;

use App\Models\Zcidjuvanya;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ZcidjuvanyaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seedAmount = rand(2,10);

        Zcidjuvanya::factory()->count($seedAmount)->create([
            'user_id' => 1,
            'child_id' => 1,
        ]);

        Zcidjuvanya::factory()->count(2)->create([
            'user_id' => 1,
            'child_id' => 1,
            'date' => now(),
            'left_time' => '00:00:35',
            'right_time' => '00:00:48',
        ]);
    }
}
