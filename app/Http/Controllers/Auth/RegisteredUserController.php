<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class RegisteredUserController extends Controller
{

    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        // Générer un mot de passe aléatoire
        $password = bin2hex(random_bytes(4)); // Mot de passe de 8 caractères

        // Création de l'utilisateur
        $user = User::create([
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($password), // Hachage du mot de passe
            'email_verified' => false,
        ]);

        // Envoi de l'email avec le mot de passe
        Mail::to($user->email)->send(new WelcomeMail($user, $password));



        return Inertia::location(route('login'));
    }
}
