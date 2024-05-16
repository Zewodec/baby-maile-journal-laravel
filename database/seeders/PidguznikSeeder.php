<?php

namespace Database\Seeders;

use App\Models\Pidguznik;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PidguznikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $amount = rand(1, 10);

        Pidguznik::factory()->count($amount)->create();

        Pidguznik::factory()->create([
            'datetime' => now(),
            'type' => 'mixed',
            'vologist' => 3,
            'kaka_color' => 'Коричневий'
        ]);

        Pidguznik::factory()->create([
            'datetime' => now(),
            'type' => 'wet',
            'vologist' => 3,
            'kaka_color' => null
        ]);

        Pidguznik::factory()->create([
            'datetime' => now(),
            'type' => 'dry',
            'vologist' => null,
            'kaka_color' => null
        ]);

        Pidguznik::factory()->create([
            'datetime' => now(),
            'type' => 'dirty',
            'vologist' => null,
            'kaka_color' => 'Коричневий'
        ]);

    }
}
