<?php

namespace App\Http\Controllers;

use App\Models\Taxonomia;
use Illuminate\Http\Request;

class TaxonomiaController extends Controller
{
    public function mindenTaxonomia(){
        return Taxonomia::all();
    }
}
