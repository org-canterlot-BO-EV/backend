<?php

use App\Models\Jegy;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jegies', function (Blueprint $table) {
            $table->char('felhasznalo_nev', 25);
            $table->integer('program_id');
            $table->integer('db');

            $table->primary(['felhasznalo_nev', 'program_id']);
            $table->foreign('felhasznalo_nev')->references('felhasznalo_nev')->on('users');
            $table->foreign('program_id')->references('program_id')->on('programs');
        });

        Jegy::create([
            'felhasznalo_nev'=>'felhasznalo',
            'program_id'=>'1',
            'db'=>'3'
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('jegies');
    }
};
