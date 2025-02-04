<?php

namespace App\Http\Controllers;

use App\Models\Jogosultsag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JogosultsagController extends Controller
{
    public function mindenJogosultsag(){
        return DB::table('jogosultsags as j')
        ->select('jogosultsag_tipus', 'elnevezes')
        ->get();
    }

    public function postJogosultsag(Request $request)
    {
        $jogosultsag = Jogosultsag::create([
            'jogosultsag_tipus'=>$request->jogosultsag_tipus,
            'elnevezes'=>$request->elnevezes
        ]);

        return response()->json([
            'message' => 'program sikeresen hozzáadva!',
            'program' => $jogosultsag
        ], 201);
    }

    public function show($jogosultsag_tipus)
    {
        $adat = Jogosultsag::where('jogosultsag_tipus', $jogosultsag_tipus)
        ->get();
        return $adat[0];
    }

    public function patchJogosultsag(Request $request, $jogosultsag_tipus){
        $record = $this->show($jogosultsag_tipus);
        $record->fill($request->all());
        $record->save();
    }

    public function destroyJogosultsag($jogosultsag_tipus)
    {
        $this->show($jogosultsag_tipus)->delete();
    }
}
