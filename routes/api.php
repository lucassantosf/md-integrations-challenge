<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;

Route::prefix('v1')->group(function () {
    Route::apiResource('people', PersonController::class);
});