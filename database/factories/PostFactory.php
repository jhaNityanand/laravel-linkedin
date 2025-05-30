<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = \App\Models\Post::class;

    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::inRandomOrder()->first()?->id ?? 1,
            'content' => $this->faker->paragraph(),
            'image' => $this->faker->optional()->imageUrl(640, 480, 'business'),
        ];
    }
} 