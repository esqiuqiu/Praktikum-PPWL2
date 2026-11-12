<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostRandomSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 25; $i++) {
            Post::create([
                'title' => fake()->sentence(3),
                'description' => fake()->paragraph(),
            ]);
        }
    }
}
