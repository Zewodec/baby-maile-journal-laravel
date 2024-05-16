<?php

namespace Database\Seeders;

use App\Models\ChasGri;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChasGriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $amount = rand(1, 10);

        ChasGri::factory()->count($amount)->create();

        ChasGri::factory()->create([
            'child_id' => 1,
            'user_id' => 1,
            'activity' => 'activity',
            'tracked_time' => '00:02:00',
            'datetime' => now(),
        ]);
    }
}
