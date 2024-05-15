<?php

namespace Database\Seeders;

use App\Models\Zrostanya;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ZrostanyaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $zrostanyaCount = rand(2,10);

        Zrostanya::factory()->count($zrostanyaCount)->create(
            [
                'child_id' => 1,
                'user_id' => 1,
            ]
        );
    }
}
