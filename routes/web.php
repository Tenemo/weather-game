<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])
    ->name('home');

Route::resource('play', GameController::class)
    ->except([
        'index',
        'create',
        'edit',
        'update',
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

Route::match(['get', 'post'], '/register', [AuthController::class, 'register'])->name('register')->middleware('guest');

Route::match(['get', 'post'], '/login', [AuthController::class, 'login'])->name('login')->middleware('guest');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
