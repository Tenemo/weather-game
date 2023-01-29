<?php

namespace Database\Factories;

use App\Models\Game;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Answer>
 */
class AnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $answer = [
            'id' => fake()->uuid(),
            'input' => mt_rand(-20, 40),
            'correct_answer' => mt_rand(-20, 40),
            'score' => mt_rand(0, 1000),
        ];
        if (mt_rand(0, 2) === 2) {
            $userId = User::factory();
            $answer['game_id'] = Game::factory(['user_id' => $userId]);
            $answer['user_id'] = $userId;
        } else {
            $answer['game_id'] = Game::factory();
        }

        return $answer;
    }
}
