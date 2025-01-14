<?php

use App\Http\Controllers\ProgramTipusController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/programtipusok', [ProgramTipusController::class, 'mindenProgramTipus']);
