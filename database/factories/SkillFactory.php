<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SkillFactory extends Factory
{
    protected $model = \App\Models\Skill::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->jobTitle(),
        ];
    }
} 