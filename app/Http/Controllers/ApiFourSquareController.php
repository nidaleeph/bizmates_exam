<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiFourSquareController extends Controller
{
    //
    public function getApiFourSquare(Request $request)
    {
        $city = $request->input('city');

        $apiKey = env('FOURSQUARE_KEY');

        $response = Http::withOptions([
            'verify' => false, // Disable SSL verification
        ])->withHeaders([
            'Authorization' => $apiKey,
            'accept' => 'application/json',
        ])->get("https://api.foursquare.com/v3/places/search?near=$city&limit=12");

        return $response->json();
    }

}
