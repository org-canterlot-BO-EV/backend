<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taxonomia extends Model
{
    use HasFactory;
    protected $primaryKey = "taxonomia_id";
    public $timestamps = false;
    
    protected $fillable = [
        'elnevezes'
    ];
}
