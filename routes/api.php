<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EdificioController;
use App\Http\Controllers\MesaController;
use App\Http\Controllers\SillaController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('edificios', EdificioController::class);
Route::apiResource('mesas', MesaController::class);
Route::apiResource('sillas', SillaController::class);
