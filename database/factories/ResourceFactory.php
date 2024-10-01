<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Resource;
use App\Models\Category;

class ResourceFactory extends Factory
{
    protected $model = Resource::class;

    public function definition()
    {
        return [
            'category_id' => Category::factory(),
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'published_at' => $this->faker->date(),
            'relevance_score' => $this->faker->numberBetween(1, 100),
        ];
    }
}
