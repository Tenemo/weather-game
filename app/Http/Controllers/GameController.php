<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Answer;
use Illuminate\Support\Facades\Storage;

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
    public function show($id)
    {
        $gameLength = 3;
        $game = Game::findOrFail($id);
        $answers = Answer::where('game_id', $game->id)->orderBy('created_at', 'desc')->get();
        $answers_count = Answer::where('game_id', $game->id)->orderBy('created_at', 'desc')->count();

        $answersString = "";
        foreach ($answers as $answer) {
            $answersString .= $answer->value . " ";
        }

        if ($answers_count > $gameLength - 1) {
            $game->score = mt_rand(0, 1000);
            $game->update();

            return view('result', [
                'game_short_id' => strtoupper(substr($id, -4)),
                'gameLength' => $gameLength,
                'answers_count' => $answers_count,
                'answers' => $answers,
                'score' => $game->score,
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
        $answer->game_id = $id;
        $answer->city = $city;
        $answer->country = $country;
        $answer->country_code = $country_code;
        $answer->continent = $continent;
        $answer->save();

        return view('game', [
            'game_id' => $id,
            'game_short_id' => strtoupper(substr($id, -4)),
            'gameLength' => $gameLength,
            'answers_count' => $answers_count + 1,
            'city' => $city,
            'country' => $country,
            'continent' => $continent,
            'answer_id' => $answer->id,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
}
