<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Crop>
 */
class CropFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(3);
        
        return [
            'title' => $title,
            'content' => $this->faker->paragraphs(3, true),
            'categories_id' => Category::inRandomOrder()->first()?->id ?? 1,
            'image' => 'crops/' . $this->faker->word() . '.jpg',
            'status' => $this->faker->boolean(80), // 80% chance of true
            'slug' => Str::slug($title),
        ];
    }
}
