<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cimkezes extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id',
        'taxonomia_id'
    ];
}
