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

        // Validation des données
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email',
            'date_of_birth' => 'nullable|date',
            'promo' => 'nullable|string|max:255',
            'password' => 'nullable|string|min:6',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Mise à jour des informations utilisateur
        $user->update($validatedData);

        // Gérer le téléchargement de l'image
        if ($request->hasFile('profile_picture')) {
            $filePath = $request->file('profile_picture')->store('uploads', 'public');
            $user->profile_picture = $filePath;
            $user->save();
        }

        // Rediriger vers le tableau de bord après la mise à jour
        return Inertia::location(route('dashboard')); // Assurez-vous que 'dashboard' est le nom de votre route
    }

}
