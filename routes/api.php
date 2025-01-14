<?php

use App\Http\Controllers\FelhasznaloController;
use App\Http\Controllers\JegyController;
use App\Http\Controllers\JogosultsagController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ProgramTipusController;
use App\Http\Controllers\TaxonomiaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Jogosultsagokra vonatkozó végpontok:
Route::get('/osszes-jogosultsag', [JogosultsagController::class, 'mindenJogosultsag']);
Route::post('/uj-jogosultsag', [JogosultsagController::class, 'postJogosultsag']);
Route::patch('/jogosultsag-valtoztatas/{jogosultsag_tipus}', [JogosultsagController::class, 'patchJogosultsag']);
Route::delete('/jogosultsag-torlese/{jogosultsag_tipus}', [JogosultsagController::class, 'destroyJogosultsag']);

//Programtípusokra vonatkozó végpontok:

//visszaadja a programtipusok 3 fajtáját 
Route::get('/programtipusok', [ProgramTipusController::class, 'mindenProgramTipus']);

//Taxonomiara vonatkozó végpontok:

//visszaadja a taxonomia osszes adatat 
Route::get('/taxonomiak', [TaxonomiaController::class, 'mindenTaxonomia']);

//Programokra vonatkozó lekérdezések:

//minden program visszaadása 
Route::get('/osszes-program', [ProgramController::class, 'mindenProgram']);
//minden adott programtipusu programot vissza ad 
Route::get('/osszes-gasztro-program/{programtipus}', [ProgramController::class, 'mindenGasztroProgram']);


//Jegyekre vonatkozó lekérdezések:

//adott felhasználó összes valaha foglalt jegye 
Route::get('/sajat-jegyeim/{felhasznalo_nev}', [JegyController::class, 'sajatJegyeim']);
//adott felhasználó aktív jegye 
Route::get('/sajat-aktiv-jegyeim/{felhasznalo_nev}', [JegyController::class, 'sajatAktivJegyeim']);
//összes aktív foglalás (db/program) 
Route::get('/osszes-foglalas', [JegyController::class, 'osszesFoglalas']);
//adott programra hány jegy van foglalva (db) 
Route::get('/osszes-foglalas-adott-programra/{program_id}', [JegyController::class, 'osszesAdottFoglalas']);

//Felhasznalokra vonatkozó lekérdezések:

//kislistázza azon felhasználókat, akiknek a kommentjei több mint ötször lettek törölté állítva

//adott felhasználónevű userre keres 

//kilistázza az összes adott jogoultsaggal rendelkezo felhazsnálót
Route::get('/felhasznalok-jogosultsag-szerint/{jogosultsag_tipus}', [FelhasznaloController::class, 'adottJogosultsagu']);
//Cikkekre vonatkozó lekérdezések:

//visszaadja az összes cikket

//iro szerinti keresés a cikkek között