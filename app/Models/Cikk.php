<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cikk extends Model
{
    use HasFactory;
    protected $primaryKey = "cikk_id";
    public $timestamps = false;

    protected $fillable = [
        'cikk_nev',
        'cikk_tartalom',
        'felhasznalo_nev'
    ];
}
