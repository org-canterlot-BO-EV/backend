<?php

namespace App\Http\Controllers;

use App\Models\Program_tipus;
use Illuminate\Http\Request;

class ProgramTipusController extends Controller
{
    public function mindenProgramTipus(){
        return Program_tipus::all();
    }
}