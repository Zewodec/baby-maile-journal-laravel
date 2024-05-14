<?php

namespace Database\Seeders;

use App\Models\Poshtovhs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PoshtovhsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ses_id = uniqid();
        Poshtovhs::create([
            'user_id' => 1,
            'child_id' => 1,
            'time' => '12:00:00',
            'date' => '2024-05-09',
            'session_id' => $ses_id,
        ]);
        Poshtovhs::create([
            'user_id' => 1,
            'child_id' => 1,
            'time' => '12:01:00',
            'date' => '2024-05-09',
            'session_id' => $ses_id,
        ]);
        Poshtovhs::create([
            'user_id' => 1,
            'child_id' => 1,
            'time' => '12:01:20',
            'date' => '2024-05-09',
            'session_id' => $ses_id,
        ]);
    }
}
