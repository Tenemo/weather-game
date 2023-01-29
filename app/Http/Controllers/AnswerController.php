<?php

namespace App\Http\Controllers;

use App\Models\Answer;

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
        $request->input('answer');
        $request->validate([
            'answer' => 'required|numeric|between:-100,100'
        ]);
        $answer = new Answer();
        $answer->score = mt_rand(0, 1000);
        $answer->correct_answer = mt_rand(-20, 40);
        $answer->input = mt_rand(-20, 40);
        $answer->save();

        return
            redirect()
            ->route('play.index')
            ->with(
                'success',
                'Answer submitted: ' . $request->input('answer')
            );
    }
}
