<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    public function store(Request $request)
    {
        // Valider les entrées du formulaire
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Tenter d'authentifier l'utilisateur avec le username et le mot de passe
        if (Auth::attempt($credentials)) {
            // Authentification réussie, régénérer la session
            $request->session()->regenerate();


            return redirect()->intended('dashboard');
        }

        // Si les identifiants sont incorrects, renvoyer une erreur
        throw ValidationException::withMessages([
            'username' => 'Les identifiants fournis sont incorrects.',
        ]);
    }
}

