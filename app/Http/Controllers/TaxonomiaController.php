<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaxonomiaController extends Controller
{
    public function mindenTaxonomia(){
        $tax = DB::table('taxonomias')
        ->select('taxonomia_id', 'elnevezes')
        ->get();
        return $tax;
    }
}
