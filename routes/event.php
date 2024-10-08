<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;


Route::prefix('explore')
    ->name('explore.')
    ->group(function () {
        Route::get('/', [EventController::class, 'explore'])
            ->name('index');

        Route::get('/winners', [EventController::class, 'exploreWinners'])
            ->name('winners');
        
            Route::get('/safe', [EventController::class, 'exploreGuaranteed'])
            ->name('guaranteed');
    });


Route::get('/', [EventController::class, 'explore'])
    ->name('explore');

Route::middleware(['auth.session'])->group(function () {
    Route::get('/my-events', [EventController::class, 'index'])
        ->name('index');

    Route::get('/create', [EventController::class, 'create'])
        ->name('create');
});
