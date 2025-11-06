<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(SutiSeeder::class);
        $this->call(TartalomSeeder::class);
        $this->call(ArSeeder::class);
    }
}
