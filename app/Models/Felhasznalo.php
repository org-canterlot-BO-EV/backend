<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Felhasznalo extends Model
{
    use HasFactory;
    protected $primaryKey = "felhasznalo_nev";
    public $timestamps = false;

    protected $fillable = [
        'felhasznalo_nev',
        'jelszo',
        'vezetek_nev',
        'kereszt_nev',
        'szul_datum',
        'telefon',
        'email',
        'jogosultsag_tipus'
    ];
}
