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
        Schema::create('program', function (Blueprint $table) {
            $table->integer('program_id', 100)->autoIncrement();
            $table->string('program_nev', 50);
            $table->longText('program_leiras');
            $table->integer('program_ar');
            $table->date('program_datum');
            $table->date('foglalas_kezdete');
            $table->date('foglalas_vege');
            $table->integer('programtipus_id');

            $table->primary('program_id');
            $table->foreign('programtipus_id')->references('programtipus_id')->on('program_tipus');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program');
    }
};
