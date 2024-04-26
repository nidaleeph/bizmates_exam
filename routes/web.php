<?php

use Illuminate\Support\Facades\Route;

Route::get('/{any}', function () {
    return view('app'); // Assuming your Vue application's main HTML file is named 'index.blade.php' and located in the 'resources/views' directory
})->where('any', '.*');
