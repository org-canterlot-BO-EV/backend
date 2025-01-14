<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Program_tipus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgramController extends Controller
{
    public function osszesFoglalas(){
        return Program::all();
    }

    public function mindenGasztroProgram($programtipus){
        return DB::table('programs as p')
        ->join('program_tipuses as pt', 'p.programtipus_id', 'pt.programtipus_id')
        ->where('pt.elnevezes', '=', $programtipus)
        ->get();
    }
}
