<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Movie;
use Database\Factories\MovieFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        //\App\Models\Movie::factory(10)->create();
        \App\Models\Tag::factory(6)
            ->sequence(
                ['category' => 'Action'],
                ['category' => 'Drama'],
                ['category' => 'Horror'],
                ['category' => 'Thriller'],
                ['category' => 'Fantasy'],
                ['category' => 'Mystery'],)
            ->create();
    }
}
