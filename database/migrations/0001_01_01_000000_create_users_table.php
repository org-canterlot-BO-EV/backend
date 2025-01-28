<?php

use App\Models\User;
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
        Schema::create('users', function (Blueprint $table) {
            $table->char('felhasznalo_nev', 25)->primary();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('vezetek_nev', 50);
            $table->string('kereszt_nev', 50);
            $table->date('szul_datum');
            $table->string('telefon')->unique();
            $table->char('jogosultsag_tipus', 3);
            $table->rememberToken();
            $table->timestamps();
            //külső kulcsok megadása:
            $table->foreign('jogosultsag_tipus')->references('jogosultsag_tipus')->on('jogosultsags');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        User::create([
            'felhasznalo_nev'=>'Admin',
            'password'=>'Admin1234',
            'vezetek_nev'=>'Vezetéknév',
            'kereszt_nev'=>'Keresztnév',
            'szul_datum'=>'20000101',
            'telefon'=>'06201234567',
            'email'=>'admin@admin.hu',
            'jogosultsag_tipus'=>'adm',
        ]);

        User::create([
            'felhasznalo_nev'=>'felhasznalo',
            'password'=>'Felhasznalo1234',
            'vezetek_nev'=>'Vezetéknév',
            'kereszt_nev'=>'Keresztnév',
            'szul_datum'=>'20000105',
            'telefon'=>'06201234568',
            'email'=>'felhasznalo@felhasznalo.hu',
            'jogosultsag_tipus'=>'fsz',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
