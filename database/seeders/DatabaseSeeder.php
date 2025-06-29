<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(DaySeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(DateBarber::class);
        $this->call(userSeeder::class);
    }
}
