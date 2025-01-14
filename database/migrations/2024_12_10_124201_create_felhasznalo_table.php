<?php

use App\Models\Felhasznalo;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('felhasznalos', function (Blueprint $table) {
            //felhasználók adatai:
            $table->char('felhasznalo_nev', 25)->primary();
            $table->string('jelszo', 100);
            $table->string('vezetek_nev', 50);
            $table->string('kereszt_nev', 50);
            $table->date('szul_datum');
            $table->string('telefon')->unique();
            $table->string('email', 100)->unique();
            $table->char('jogosultsag_tipus', 3);
            //külső kulcsok megadása:
            $table->foreign('jogosultsag_tipus')->references('jogosultsag_tipus')->on('jogosultsags');
        });

        Felhasznalo::create([
            'felhasznalo_nev'=>'Admin',
            'jelszo'=>Hash::make('Admin1234'),
            'vezetek_nev'=>'Vezetéknév',
            'kereszt_nev'=>'Keresztnév',
            'szul_datum'=>'20000101',
            'telefon'=>'06201234567',
            'email'=>'admin@admin.hu',
            'jogosultsag_tipus'=>'adm',
        ]);

        Felhasznalo::create([
            'felhasznalo_nev'=>'Felhasznalo',
            'jelszo'=>Hash::make('Felhasznalo1234'),
            'vezetek_nev'=>'Vezetéknév',
            'kereszt_nev'=>'Keresztnév',
            'szul_datum'=>'20000105',
            'telefon'=>'06201234568',
            'email'=>'felhasznalo@felhasznalo.hu',
            'jogosultsag_tipus'=>'fsz',
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('felhasznalo');
    }
};
