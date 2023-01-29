<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnswerPostRequest;
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
    public function store(AnswerPostRequest $request)
    {

        $gameLength = 3;

        $request->validated();

        $answer_id = $request->input('answer_id');
        $answer = Answer::findOrFail($answer_id);

        $correct_answer = $answer->correct_answer;
        $value = $request->input('answer');
        $score = 100 - (abs($correct_answer - $value)) * 7;
        if ($score < 0) {
            $score = 0;
        }
        if ($score === 100) {
            $score = 200;
        }

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
