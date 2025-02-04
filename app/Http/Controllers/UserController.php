<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function mindenFelhasznalo(){
        $users = DB::table('users')
        ->select('felhasznalo_nev', 'email', 'vezetek_nev', 'kereszt_nev', 'szul_datum', 'telefon', 'jogosultsag_tipus')
        ->get();
        return $users;
    }
}
