<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home()
    {
        $highScores = DB::table('games')
            ->select('games.username', 'games.score')
            ->whereNotNull('games.username')
            ->orderBy('score', 'desc')
            ->take(10)
            ->get();

        return view('home', ['highScores' => $highScores]);
    }
}
