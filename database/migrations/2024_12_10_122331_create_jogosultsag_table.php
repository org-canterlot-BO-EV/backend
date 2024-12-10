<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jogosultsag', function (Blueprint $table) {
            $table->char('jogosultsag_tipus', 3)->primary();
            $table->string('elnevezes');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jogosultsag');
    }
};
