<?php

use Illuminate\Support\Facades\Route;

Route::domain('{subdomain}.web.ap.it')
    ->where('subdomain', '^(?!init$).*')
    ->group(function () {
        Route::get('/{any?}', function () {
            return response()->view('wildcard', [], 404);
        })->where('any', '.*');
    });
