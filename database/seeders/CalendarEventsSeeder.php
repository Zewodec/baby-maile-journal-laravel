<?php

namespace Database\Seeders;

use App\Models\CalendarEvents;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CalendarEventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $count = rand(10, 20);

        CalendarEvents::factory()->count($count)->create();

        CalendarEvents::factory()->create([
            'date' => now(),
            'text' => 'ПЕРШІ КРОКИ АОАОАОАОАООА!!!!',
            'user_id' => 1,
            'child_id' => 1,
        ]);

        CalendarEvents::factory()->create([
            'date' => "2024-05-15",
            'text' => 'ПЕРШІ СЛОВААА АОАОАОАОАООА!!!!',
            'user_id' => 1,
            'child_id' => 1,
        ]);
    }
}
