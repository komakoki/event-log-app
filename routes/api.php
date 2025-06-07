<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LiveController;

Route::get('/lives', [LiveController::class, 'index']);
Route::post('/lives', [LiveController::class, 'store']);
