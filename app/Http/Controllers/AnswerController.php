<?php

namespace App\Http\Controllers;

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
        return
            redirect()
            ->route('play.index')
            ->with(
                'success',
                'Answer submitted: ' . $request->input('answer')
            );
    }
}
