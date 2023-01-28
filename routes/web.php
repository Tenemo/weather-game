<?php

use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view("home");
})
    ->name('home');

Route::get('/game', function () {
    return view("game");
})
    ->name('game');

Route::post('/game', function (Request $request) {
    return
        redirect()
        ->route('game')
        ->with(
            'success',
            'Game created'
        );
})
    ->name('game.store');

Route::post('/answer', function (Request $request) {
    $request->input('answer');
    $request->validate([
        'answer' => 'required|numeric|between:-100,100'
    ]);
    return
        redirect()
        ->route('game')
        ->with(
            'success',
            'Answer submitted' . $request->input('answer')
        );
})
    ->name('answer.store');
