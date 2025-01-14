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
        Schema::create('cimkezes', function (Blueprint $table) {
            $table->integer('program_id');
            $table->integer('taxonomia_id');

            $table->primary(['program_id', 'taxonomia_id']);
            $table->foreign('program_id')->references('program_id')->on('program');
            $table->foreign('taxonomia_id')->references('taxonomia_id')->on('taxonomias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cimkezes');
    }
};
