<?php

namespace Database\Seeders;

use App\Models\ImportantEvents;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImportantEventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * 'user_id',
     * 'child_id',
     * 'event_name',
     * 'event_description',
     * 'event_text',
     * 'image',
     */
    public function run(): void
    {
        $amount = rand(2, 10);

        ImportantEvents::factory()->count($amount)->create();

        ImportantEvents::factory()->create([
            'user_id' => 1,
            'child_id' => 1,
            'event_name' => 'Подія року',
            'event_description' => 'Нам один рочок',
            'event_text' => 'Маленькі кроки роблять великі речі',
        ]);
    }
}
