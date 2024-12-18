<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\Lession_HistorySeeder;
use Database\Seeders\Social_PostSeeder;
use Database\Seeders\UserSeeder;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            // Lession_HistorySeeder::class,
            // Social_PostSeeder::class,
        ]);
    }
}
