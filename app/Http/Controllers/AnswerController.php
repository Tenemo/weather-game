<?php

namespace App\Http\Controllers;

use App\Models\Answer;
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

        $request->validate([
            'answer' => 'required|numericbetween:-100,100'
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

        return
            redirect()
            ->route('play.show', $game_id);
    }
}
