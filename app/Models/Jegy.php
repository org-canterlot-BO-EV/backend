<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jegy extends Model
{
    use HasFactory;

    protected $fillable = [
        'felhasznalo_nev',
        'program_id',
        'db'
    ];
}
