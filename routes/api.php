<?php

use App\Http\Controllers\JegyController;
use App\Http\Controllers\JogosultsagController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ProgramTipusController;
use App\Http\Controllers\TaxonomiaController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

//programokra vonatkozó
Route::get('/programok', [ProgramController::class, "mindenProgram"]);
Route::get('/programtipusok', [ProgramTipusController::class, "mindenProgramTipus"]);
Route::post('/program-hozzadasa', [ProgramController::class, "store"]);

//jegyekre vonatkozó
Route::get('/sajat-jegyeim/{felhasznalo_nev}', [JegyController::class, 'sajatJegyeim']);
Route::get('/sajat-aktiv-jegyeim/{felhasznalo_nev}', [JegyController::class, 'sajatAktivJegyeim']);
Route::get('/osszes-foglalas', [JegyController::class, 'osszesFoglalas']);
Route::get('/osszes-foglalas-adott-programra/{program_id}', [JegyController::class, 'osszesAdottFoglalas']);
Route::post('/foglalas_hozzaadasa', [JegyController::class, 'foglalasHozzaadasa']);

//jogosultsagokra vonatkozó
Route::get('/osszes-jogosultsag', [JogosultsagController::class, 'mindenJogosultsag']);
Route::get('/adott-jogosultsag', [JogosultsagController::class, 'show']);
Route::post('/uj-jogosultsag', [JogosultsagController::class, 'postJogosultsag']);
Route::patch('/jogosultsag-valtoztatas/{jogosultsag_tipus}', [JogosultsagController::class, 'patchJogosultsag']);
Route::delete('/jogosultsag-torlese/{jogosultsag_tipus}', [JogosultsagController::class, 'destroyJogosultsag']);

//felhasználókra vonatkozó
Route::get('/felhasznalok', [UserController::class, "mindenFelhasznalo"]);

//taxonomiara vonatkozó
Route::get('/mindentaxonomia', [TaxonomiaController::class, "mindenTaxonomia"]);