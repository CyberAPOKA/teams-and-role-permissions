<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Debug\DebugController;

if (App::environment('local')) {
    Route::prefix('debug')->group(function () {
        Route::get('user', [DebugController::class, 'user']);
    });
}
