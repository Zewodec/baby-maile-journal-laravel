<?php

namespace Database\Seeders;

use App\Models\GoduvanyaTverda;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GoduvanyaTverdaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * "datetime" => "2024-05-16T04:19"
     * "group1" => "Молочні продукти"
     * "group2" => "Злаки"
     * "group3" => "Інше"
     * "goduvanya_type" => "tverda"
     * "tverda_time" => "1.331"
     */
    public function run(): void
    {
        $amount = rand(1, 10);

        GoduvanyaTverda::factory()->count($amount)->create();

        GoduvanyaTverda::factory()->create([
            'datetime' => now(),
            'group1' => 'Молочні продукти',
            'group2' => 'Злаки',
            'group3' => 'Інше',
            'tverda_time' => '120',
            'user_id' => 1,
            'child_id' => 1,
        ]);
    }
}
