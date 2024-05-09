<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\VagitnistVaga;
use Illuminate\Database\Seeder;

class VagitnistVagaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::inRandomOrder()->get();

        foreach($users as $user) {
            $vagitnistVagaCount = rand(2, 6);

            VagitnistVaga::factory()->count($vagitnistVagaCount)->create([
                'user_id' => 1,
                'children_id' => 1,
            ]);
        }
    }
}
