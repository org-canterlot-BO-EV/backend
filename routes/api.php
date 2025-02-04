<?php

use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ProgramTipusController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/programtipusok', [ProgramTipusController::class, "mindenProgramTipus"]);
Route::get('/felhasznalok', [UserController::class, "mindenFelhasznalo"]);
Route::get('/programok', [ProgramController::class, "mindenProgram"]);
Route::post('/program-hozzadasa', [UserController::class, "store"]);