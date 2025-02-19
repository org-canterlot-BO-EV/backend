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
        try {
            $validatedData = $request->validate([
                'program_nev' => 'required|string|max:255',
                'program_leiras' => 'required|string',
                'program_ar' => 'required|numeric|min:0',
                'program_datum' => 'required|date',
                'foglalas_kezdete' => 'required|date',
                'foglalas_vege' => 'required|date|after_or_equal:foglalas_kezdete',
                'programtipus_id' => 'required|exists:program_tipuses,programtipus_id',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        }
        
    
        $program = Program::create([
            'program_nev' => $validatedData['program_nev'], 
            'program_leiras' => $validatedData['program_leiras'],
            'program_ar' => $validatedData['program_ar'],
            'program_datum' => $validatedData['program_datum'],
            'foglalas_kezdete' => $validatedData['foglalas_kezdete'],
            'foglalas_vege' => $validatedData['foglalas_vege'],
            'programtipus_id' => $validatedData['programtipus_id'],
        ]);
    

        return response()->json([
            'message' => 'Program sikeresen hozzáadva!',
            'program' => $program
        ], 201);
    }
    
}
