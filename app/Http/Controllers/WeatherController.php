<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Carbon\Carbon;

class WeatherController extends Controller
{
    static function checkWeather($lat, $lon)
    {
        // $apiKey = env('OWM_API_KEY');
        // $client = new Client();
        // $response = $client->get("https://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lon&appid=$apiKey", ['verify' => false]);
        // $weather = json_decode($response->getBody());

        // $time = Carbon::createFromTimestampUTC($response->dt);
        // $time->timezone = $response->timezone;
        // $formattedTime = $time->format('g:i A');


        $apiKey = env('WA_API_KEY');
        $client = new Client();
        $response = $client->get("https://api.weatherapi.com/v1/current.json?key=$apiKey&q=$lat,$lon&aqi=no", ['verify' => false]);
        $weather = json_decode($response->getBody());

        $time = date("g:i A", strtotime($weather->location->localtime));
        $temperature = round($weather->current->temp_c, 0);

        return [$temperature, $time];
    }
}
