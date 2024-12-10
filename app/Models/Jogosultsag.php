<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jogosultsag extends Model
{
    use HasFactory;
    protected $primaryKey = "jogosultsag_tipus";

    protected $fillable = [
        'jogosultsag_tipus',
        'elnevezes'
    ];
}
