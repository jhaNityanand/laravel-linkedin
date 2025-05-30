<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ConnectionFactory extends Factory
{
    protected $model = \App\Models\Connection::class;

    public function definition(): array
    {
        $sender = \App\Models\User::inRandomOrder()->first();
        $receiver = \App\Models\User::where('id', '!=', $sender?->id)->inRandomOrder()->first();
        return [
            'sender_id' => $sender?->id ?? 1,
            'receiver_id' => $receiver?->id ?? 2,
            'status' => $this->faker->randomElement(['pending', 'accepted', 'rejected']),
        ];
    }
} 