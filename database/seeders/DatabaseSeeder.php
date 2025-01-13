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
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            LanguageSeeder::class,
            CustomerSeeder::class,
            CategorySeeder::class,
            GroupSeeder::class,
            DistrictSeeder::class,
        ]);
    }
}
