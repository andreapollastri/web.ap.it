<?php

use Illuminate\Support\Facades\Route;

Route::domain('{subdomain}.web.ap.it')->group(function () {
    Route::get('/{any?}', function () {
        return view('wildcard');
    })->where('any', '.*');
});

Route::get('/', function () {
    return view('welcome');
});
