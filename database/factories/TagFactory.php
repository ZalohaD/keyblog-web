<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tags = [
            'Keyboards',
            'MechaBoards',
            'Gaming',
            'Wireless',
            'Keycaps',
            'Switches',
            'Stabilizers',
            'Lubing',
            'RGB',
            'Headsets',
            'DIYBoards'
        ];
        return [
            'name' => $this->faker->unique()->randomElement($tags),
            'slug' => $this->faker->unique()->slug(),
        ];
    }
}
