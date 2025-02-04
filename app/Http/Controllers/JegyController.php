<?php

namespace App\Http\Controllers;

use App\Models\Jegy;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class JegyController extends Controller
{
    public function osszesFoglalas(){
        return DB::table('jegies as j')
        ->join('programs as p', 'j.program_id', 'p.program_id')
        ->selectRaw('program_nev, sum(db) as ennyi')
        ->groupBy('program_nev')
        ->get();
    }
    
    public function sajatJegyeim($felhasznalo_nev){
        return DB::table('jegies as j')
        ->where('felhasznalo_nev', '=', $felhasznalo_nev)
        ->get();
    }

    public function sajatAktivJegyeim($felhasznalo_nev){
        $most = Carbon::now();
        
        return DB::table('jegies as j')
        ->join('programs as p', 'j.program_id', 'p.program_id')
        ->where('felhasznalo_nev', '=', $felhasznalo_nev)
        ->whereDate('program_datum', '>', $most)
        ->selectRaw('program_nev, sum(db) as ennyi')
        ->groupBy('program_nev')
        ->get();
    }

    public function osszesAdottFoglalas($program_id){
        return DB::table('jegies as j')
        ->join('programs as p', 'j.program_id', 'p.program_id')
        ->where('j.program_id', '=', $program_id)
        ->selectRaw('program_nev, sum(db) as ennyi')
        ->groupBy('program_nev')
        ->get();
    }

    public function foglalasHozzaadasa(Request $request){
        $foglalas = Jegy::create([
            'felhasznalo_nev' => $request->felhasznalo_nev,
            'program_id' => $request->program_id,
            'db' => $request->db
        ]);

        return response()->json([
            'message' => 'program sikeresen hozzáadva!',
            'program' => $foglalas
        ], 201);
    }
}
