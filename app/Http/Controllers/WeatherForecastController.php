<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherForecastController extends Controller
{
    public function getWeatherForecast(Request $request)
    {
        $city = $request->input('city');

        $apiKey = env('OPENWEATHER_KEY');

        // Fetch the 5-day forecast data

        $response = Http::get("http://api.openweathermap.org/data/2.5/forecast?q=$city&appid=$apiKey");

        // Fetch the current weather data
        $currentForecast = Http::get("http://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey");

        // Merge the current forecast data into the response
        $weatherData = $response->json();
        $weatherData['currentForecast'] = $currentForecast->json();

        return $weatherData;
    }
}
