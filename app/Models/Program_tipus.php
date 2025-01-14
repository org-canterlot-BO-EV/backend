<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program_tipus extends Model
{
    use HasFactory;
    protected $primaryKey = "programtipus_id";
    public $timestamps = false;

    protected $fillable = [
        'elnevezes'
    ];
}
