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
        $title = $this->faker->sentence(4);
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));


        return [
            'publisher_id' => Publisher::factory(),
            'title' => $title,
            'description' => $this->faker->text(255),
            'image' => $this->faker->imageUrl(),
            'slug' => $slug,
            'featured' => $this->faker->boolean(),
        ];
    }
}
