<?php

use App\Models\Program_tipus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('program_tipuses', function (Blueprint $table) {
            $table->integer('programtipus_id', true);
            $table->string('elnevezes', 30)->unique();

            $table->primary('programtipus_id');
        });

        Program_tipus::create([
            'elnevezes'=>'Színház és Művészet'
        ]);

        Program_tipus::create([
            'elnevezes'=>'Gasztró'
        ]);

        Program_tipus::create([
            'elnevezes'=>'Közösségi'
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('program_tipuses');
    }
};
