<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    public function store(Request $request)
    {
        // Valider les entrées du formulaire
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Vérifier si l'utilisateur existe
        $user = User::where('username', $credentials['username'])->first();

        if (!$user) {
            throw ValidationException::withMessages([
                'username' => 'Ce compte n\'existe pas. Veuillez vous inscrire.',
            ]);
        }

        // Vérifier les identifiants
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return Inertia::location(route('dashboard'));
        }

        // Si les identifiants sont incorrects, renvoyer une erreur
        throw ValidationException::withMessages([
            'username' => 'Les identifiants fournis sont incorrects.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Inertia::location(route('login')); 
    }
}


