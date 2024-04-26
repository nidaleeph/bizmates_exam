<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherForecastController;
use App\Http\Controllers\ApiFourSquareController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/weather-forecast', [WeatherForecastController::class, 'getWeatherForecast']);
Route::post('/apiFourSquare', [ApiFourSquareController::class, 'getApiFourSquare']);

