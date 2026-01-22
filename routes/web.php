<?php

use Illuminate\Support\Facades\Route;

// Wildcard catchall for unregistered subdomains
Route::domain('{subdomain}.web.ap.it')->group(function () {
    Route::get('/{any?}', function () {
        return response()->view('wildcard', [], 404);
    })->where('any', '.*');
});

// Home page
Route::get('/', function () {
    return view('welcome');
});
