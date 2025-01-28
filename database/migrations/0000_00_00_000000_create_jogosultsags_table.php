<?php

use App\Models\Jogosultsag;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jogosultsags', function (Blueprint $table) {
            $table->char('jogosultsag_tipus', 3)->primary();
            $table->string('elnevezes')->unique();
        });

        Jogosultsag::create([
            'jogosultsag_tipus'=>'adm',
            'elnevezes'=>'adminisztrátor'
        ]);

        Jogosultsag::create([
            'jogosultsag_tipus'=>'mod',
            'elnevezes'=>'moderátor'
        ]);

        Jogosultsag::create([
            'jogosultsag_tipus'=>'pub',
            'elnevezes'=>'publikáló'
        ]);

        Jogosultsag::create([
            'jogosultsag_tipus'=>'fsz',
            'elnevezes'=>'felhasználó'
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('jogosultsags');
    }
};
