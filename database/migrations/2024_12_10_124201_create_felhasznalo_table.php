<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('felhasznalo', function (Blueprint $table) {
            //felhasználók adatai:
            $table->char('felhasznalo_nev', 25)->primary();
            $table->string('jelszo', 30);
            $table->string('vezetek_nev', 50);
            $table->string('kereszt_nev', 50);
            $table->date('szul_datum');
            $table->integer('telefon');
            $table->string('email', 100)->unique();
            $table->char('jogosultsag_tipus', 3);
            //külső kulcsok megadása:
            $table->foreign('jogosultsag_tipus')->references('jogosultsag_tipus')->on('jogosultsag');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('felhasznalo');
    }
};
