<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\AnswerController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', [HomeController::class, 'home'])
    ->name('home');

Route::resource('play', GameController::class)
    ->except([
        'create',
        'edit',
        'destroy',
    ]);
Route::resource('answer', AnswerController::class)
    ->except([
        'index',
        'create',
        'show',
        'edit',
        'update',
        'destroy'
    ]);
