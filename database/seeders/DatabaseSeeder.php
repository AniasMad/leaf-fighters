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
            QuestSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            StorySeeder::class
        ]);
    }
}
