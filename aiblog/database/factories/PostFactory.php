<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $id = $this->faker->unique()->numberBetween(1, 10000);
        
        return [
            'title' => $this->faker->sentence(6, true),
            'body' => $this->faker->paragraphs(5, true),
            'featured_image' => "https://picsum.photos/seed/{$id}/800/400",
            'category_id' => Category::inRandomOrder()->first()->id ?? 1,
            'user_id' => User::inRandomOrder()->first()->id ?? 1,
        ];
    }
}
