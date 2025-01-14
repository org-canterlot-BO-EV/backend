<?php

namespace App\Http\Controllers;

use App\Models\Felhasznalo;
use App\Models\Jogosultsag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FelhasznaloController extends Controller
{
    public function adottJogosultsagu($jogosultsag_tipus){
        return DB::table('felhasznalos as f')
        ->where('jogosultsag_tipus', '=', $jogosultsag_tipus)
        ->select('felhasznalo_nev', 'vezetek_nev', 'kereszt_nev', 'telefon', 'email')
        ->get();
    }
}
