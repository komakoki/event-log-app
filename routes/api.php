<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LiveController;
use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/lives', [LiveController::class, 'index']);
    Route::post('/lives', [LiveController::class, 'store']);
    Route::get('/lives/{id}', [LiveController::class, 'show']);
    Route::put('/lives/{id}', [LiveController::class, 'update']);
    Route::delete('/lives/{id}', [LiveController::class, 'destroy']);
});
