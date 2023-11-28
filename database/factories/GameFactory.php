<?php

namespace Database\Factories;

use App\Core\Games\Game;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class GameFactory extends Factory
{
    protected $model = Game::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'reference' => $this->faker->numberBetween(1, 100000),
            'opponent' => $this->faker->name,
            'host_score' => $this->faker->numberBetween(1, 9),
            'opponent_score' => $this->faker->numberBetween(1, 9),
        ];
    }
}
