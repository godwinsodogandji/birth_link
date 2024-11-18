<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\User;
class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // dd($user);
        return Inertia::render('Profile', [
            'user' => $user,
        ]);
    }

    public function update(Request $request)
    {

        /** @var User $user */

        $user = Auth::user(); // Récupérer l'utilisateur connecté

        if (!$user) {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter.');
        }

        // Validation des données
        $data = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'date_of_birth' => 'nullable|date',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'promo' => 'nullable|string|max:255',
        ]);

        // Vérifiez si une image a été téléchargée
        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $data['profile_picture'] = $path; // Stockez le chemin de l'image
        }

        // Mettre à jour les informations de l'utilisateur
        $user->update($data);

        return redirect()->route('profile')->with('success', 'Profil mis à jour avec succès.');
    }


}

