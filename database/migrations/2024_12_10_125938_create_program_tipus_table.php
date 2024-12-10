<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('program_tipus', function (Blueprint $table) {
            $table->integer('programtipus_id')->autoIncrement();
            $table->string('elnevezes', 30)->unique();

            $table->primary('programtipus_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('program_tipus');
    }
};
