<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jegy', function (Blueprint $table) {
            $table->char('felhasznalo_nev', 25);
            $table->integer('program_id');
            $table->integer('db');

            $table->primary(['felhasznalo_nev', 'program_id']);
            $table->foreign('felhasznalo_nev')->references('felhasznalo_nev')->on('felhasznalo');
            $table->foreign('program_id')->references('program_id')->on('program');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jegy');
    }
};
