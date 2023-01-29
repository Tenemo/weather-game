<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Answer;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class GameController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $game = new Game();
        $game->save();


        return
            redirect()
            ->route('play.show', $game->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        $gameLength = 3;
        $answers = Answer::where('game_id', $game->id)
            ->orderBy('id', 'asc')
            ->get();
        $answers_count = Answer::where('game_id', $game->id)
            ->count();

        if ($answers_count > $gameLength - 1) {
            $highScores = DB::table('games')
                ->join('users', 'games.user_id', '=', 'users.id')
                ->select('users.name', 'games.score')
                ->orderBy('score', 'desc')
                ->take(10)
                ->get();
            return view('result', [
                'game_short_id' => strtoupper(substr($game->id, -4)),
                'gameLength' => $gameLength,
                'answers_count' => $answers_count,
                'answers' => $answers,
                'score' => $game->score,
                'highScores' => $highScores,
            ]);
        }
        $json = file_get_contents(base_path('resources/cities.json'), true);

        $cities = json_decode($json, true);
        $randomCity = $cities[array_rand($cities)];
        $city = $randomCity['name'];
        $country = $randomCity['country'];
        $country_code = $randomCity['countryCode'];
        $continent = $randomCity['continent'];

        $answer = new Answer();
        $answer->correct_answer = mt_rand(-20, 40);
        $answer->game_id = $game->id;
        $answer->city = $city;
        $answer->country = $country;
        $answer->country_code = $country_code;
        $answer->continent = $continent;
        $answer->save();

        return view('game', [
            'game_id' => $game->id,
            'game_short_id' => strtoupper(substr($game->id, -4)),
            'gameLength' => $gameLength,
            'answers_count' => $answers_count + 1,
            'city' => $city,
            'country' => $country,
            'continent' => $continent,
            'answer_id' => $answer->id,
        ]);
    }
}
