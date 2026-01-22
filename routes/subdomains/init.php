<?php

use App\Subdomains\Init\InitController;
use Illuminate\Support\Facades\Route;

Route::domain('init.web.ap.it')->group(function () {
    Route::get('/', [InitController::class, 'index'])->name('init.index');

    Route::get('/assets/{path}', [InitController::class, 'asset'])
        ->where('path', '.*')
        ->name('init.asset');

    Route::get('/bin/{path}', [InitController::class, 'bin'])
        ->where('path', '.*')
        ->name('init.bin');

    Route::get('/stubs/{path}', [InitController::class, 'stubs'])
        ->where('path', '.*')
        ->name('init.stubs');

    Route::fallback([InitController::class, 'notFound']);
});
