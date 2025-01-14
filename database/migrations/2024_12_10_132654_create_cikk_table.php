<?php

use App\Models\Cikk;
use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cikks', function (Blueprint $table) {
            $table->integer('cikk_id')->autoIncrement();
            $table->string('cikk_nev', 50);
            $table->longText('cikk_tartalom');
            $table->date('letrehozas_datuma')->default(Carbon::now());
            $table->char('felhasznalo_nev', 25);


            $table->primary('cikk_id');
            $table->foreign('felhasznalo_nev')->references('felhasznalo_nev')->on('felhasznalos');
        });

        Cikk::create([
            'cikk_nev'=>'',
            'cikk_tartalom'=>'',
            'felhasznalo_nev'=>'admin'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cikk');
    }
};
