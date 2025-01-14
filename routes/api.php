<?php

use App\Http\Controllers\ProgramTipusController;
use App\Http\Controllers\TaxonomiaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Programtípusokra vonatkozó végpontok:
Route::get('/programtipusok', [ProgramTipusController::class, 'mindenProgramTipus']);

//Taxonomiara vonatkozó végpontok
Route::get('/taxonomiak', [TaxonomiaController::class, 'mindenTaxonomia']);

