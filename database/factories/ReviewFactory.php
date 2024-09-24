<?php

// Esteban

namespace Database\Factories;

use App\Models\CustomUser;
use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    public function definition(): array
    {
        return [
            'custom_user_id' => CustomUser::all()->random()->id,
            'game_id' => Game::all()->random()->id,
            'rating' => $this->faker->numberBetween($min = 1, $max = 5),
            'comment' => $this->faker->paragraph,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
