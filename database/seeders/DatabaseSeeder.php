<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            UserSeeder::class,
            AdminUserSeeder::class,
            ChildSeeder::class,
            VagitnistVagaSeeder::class,
            PoshtovhsSeeder::class,
            SonSeeder::class,
            ProgulyankaSeeder::class,
            ZrostanyaSeeder::class,
            ZcidjuvanyaSeeder::class,
            TemperatureZdorovyaSeeder::class,
            SymptomesZdorovyaSeeder::class,
            LikyZdorovyaSeeder::class,
            ChasGriSeeder::class,
            GoduvanyaGrudySeeder::class,
            GoduvanyaPlashechkaSeeder::class,
            GoduvanyaTverdaSeeder::class,
            PidguznikSeeder::class,
            ImportantEventsSeeder::class,
            CalendarEventsSeeder::class,
            CalendarImagesSeeder::class,
            SettingsSeeder::class,
            ParentsSeeder::class,
        ]);
    }
}
