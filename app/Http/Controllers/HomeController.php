<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home()
    {
        $highScores = DB::table('games')
            ->join('users', 'games.user_id', '=', 'users.id')
            ->select('users.name', 'games.score')
            ->orderBy('score', 'desc')
            ->take(10)
            ->get();

        return view('home', ['highScores' => $highScores]);
    }
}
