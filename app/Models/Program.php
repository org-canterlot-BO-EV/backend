<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $primaryKey = "program_id";
    public $timestamps = false;

    protected $fillable = [
        'program_nev',
        'program_leiras',
        'program_ar',
        'program_datum',
        'foglalas_kezdete',
        'foglalas_vege',
        'programtipus_id'
    ];
}
