<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function mindenProgram(){
        return Program::all();
    }

    public function store(Request $request){
        $program = Program::create([
            'program_nev' => $request->program_nev,
            'program_leiras' => $request->program_leiras,
            'program_ar' => $request->program_ar,
            'program_datum' => $request->program_datum,
            'foglalas_kezdete' => $request->foglalas_kezdete,
            'foglalas_vege' => $request->foglalas_vege,
            'programtipus_id' => $request->programtipus_id
        ]);

        return response()->json([
            'message' => 'program sikeresen hozzáadva!',
            'program' => $program
        ], 201);
    }
}
