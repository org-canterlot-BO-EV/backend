<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): Response
    {
        $request->validate([
            'felhasznalo_nev' => ['required', 'string', 'max:25', 'unique:'.User::class],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'jelszo' => ['required', 'confirmed', Rules\Password::defaults()],
            'vezetek_nev' => ['required', 'string', 'max:50'],
            'kereszt_nev' => ['required', 'string', 'max:50'],
            'szul_datum' => ['required', 'date'],
            'telefon' => ['required', 'string', 'unique:'.User::class],
        ]);

        $user = User::create([
            'felhasznalo_nev' => $request->felhasznalo_nev,
            'email' => $request->email,
            'password' => Hash::make($request->string('password')),
            'vezetek_nev' => $request->vezetek_nev,
            'kereszt_nev' => $request->kereszt_nev,
            'szul_datum' => $request->szul_datum,
            'telefon' => $request->telefon,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return response()->noContent();
    }
}
