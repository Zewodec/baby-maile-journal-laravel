<?php

namespace Database\Seeders;

use App\Models\Son;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::inRandomOrder()->get();

        foreach($users as $user) {
            $sonCount = rand(2, 6);

            Son::factory()->count($sonCount)->create([
                'user_id' => 1,
                'child_id' => 1,
            ]);
        }

        Son::factory()->create([
            'user_id' => 1,
            'child_id' => 1,
            'time' => now(),
            'date' => now(),
        ]);
    }
}
