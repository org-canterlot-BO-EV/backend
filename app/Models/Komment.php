<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komment extends Model
{
    use HasFactory;
    protected $primaryKey = "komment_id";
    public $timestamps = false;

    protected $fillable = [
        'komment_tartalom',
        'cikk_id',
        'felhasznalo_nev'
    ];
}
