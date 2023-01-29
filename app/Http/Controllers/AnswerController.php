<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Game;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $gameLength = 3;

        $request->validate([
            'answer' => 'required|numeric|between:-100,100'
        ]);

        $answer_id = $request->input('answer_id');
        $answer = Answer::findOrFail($answer_id);

        $correct_answer = $answer->correct_answer;
        $value = $request->input('answer');
        $score = 200 - (abs($correct_answer - $value));

        $answer->score = $score;
        $answer->value = $value;

        $game_id = $request->input('game_id');

        $answer->update();

        $answers_count = Answer::where('game_id', $game_id)->count();
        if ($answers_count > $gameLength - 1) {
            $game = Game::findOrFail($game_id);
            $answers = Answer::where('game_id', $game->id)
                ->get()->toArray();
            $game_score = array_reduce($answers, function ($carry, $item) {
                return $carry + $item['score'];
            });
            $game->score = $game_score;
            $game->update();
        }


        return
            redirect()
            ->route('play.show', $game_id);
    }
}
