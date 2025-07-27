<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Alice and Bob users
        User::factory()->create([
            'name' => 'Alice',
            'email' => 'alice@example.com',
        ]);

        User::factory()->create([
            'name' => 'Bob',
            'email' => 'bob@example.com',
        ]);

        // Seed categories first
        $this->call(CategorySeeder::class);

        // Create 20 posts with random categories and users
        Post::factory(20)->create();

        // Create random comments for posts (3-8 comments per post)
        Post::all()->each(function ($post) {
            Comment::factory(rand(3, 8))->create([
                'post_id' => $post->id
            ]);
        });
    }
}
