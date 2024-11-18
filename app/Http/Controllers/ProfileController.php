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

        return Inertia::render('Profile', [
            'user' => $user,
        ]);
    }

    public function update(Request $request)
    {

        /** @var User $user */

        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->withErrors(['error' => 'Veuillez vous connecter.']);
        }

        // Validation des données
        $data = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'date_of_birth' => 'nullable|date',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'promo' => 'nullable|string|max:255',
            'password' => 'nullable|string|min:8',
        ]);

        // Gestion du fichier de profil
        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $data['profile_picture'] = $path; // Stockez le chemin de l'image
        }


        // Mettre à jour les informations de l'utilisateur
        try {
            $user = User::where('id', $user->id)->update($data);
            return response()->json(['message' => 'Profil mis à jour avec succès.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors de la mise à jour : ' . $e->getMessage()], 500);
        }

    }
}
