<?php

namespace Database\Seeders;

use App\Models\GoduvanyaPlashechka;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GoduvanyaPlashechkaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $amount = rand(2,10);

        GoduvanyaPlashechka::factory()->count($amount)->create();

        GoduvanyaPlashechka::factory()->create([
            'datetime' => now(),
            'plashechka_type' => 'Суміш',
            'plashechka_amount' => 216,
            'plashechka_time' => '04:03',
            'goduvanya_type' => 'plashechka',
            'user_id' => 1,
            'child_id' => 1,
        ]);
    }
}
