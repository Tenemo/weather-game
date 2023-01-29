<?php

namespace App\Http\Controllers;

use App\Models\Answer;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $highScores = [12, 13];
        return view('home', ['highScores' => $highScores]);
    }
}
