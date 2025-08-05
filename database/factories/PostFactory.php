<?php

namespace Database\Factories;

use App\Models\Publisher;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $this->faker->name())));


        return [
            'publisher_id' => Publisher::factory(),
            'title' => $this->faker->name(),
            'description' => $this->faker->text(255),
            'image' => $this->faker->imageUrl(),
            'slug' => $slug,
            'featured' => $this->faker->boolean(),
        ];
    }
}
