<?php

namespace Database\Seeders;

use App\Models\CalendarImages;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CalendarImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $count = rand(20, 50);

        CalendarImages::factory()->count($count)->create();
    }
}
