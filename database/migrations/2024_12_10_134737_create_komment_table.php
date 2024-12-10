<?php

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
        Schema::create('komment', function (Blueprint $table) {
            $table->integer('komment_id')->autoIncrement();
            $table->longText('komment_tartalom');
            $table->date('datum')->getdate();
            //a státusz jelzi hogy: 0 - jóváhagyásra vár | 1 - elutasítva | 2 - elfogadva (automatikusan mindig 0, jogosultsággal kezelhető)
            $table->integer('statusz')->default(0);
            $table->integer('cikk_id');
            $table->char('felhasznalo_nev', 25);

            $table->primary('komment_id');
            $table->foreign('cikk_id')->references('cikk_id')->on('cikk');
            $table->foreign('felhasznalo_nev')->references('felhasznalo_nev')->on('felhasznalo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komment');
    }
};
