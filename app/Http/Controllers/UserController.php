<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        // Récupérer tous les utilisateurs avec certaines informations
        $users = User::select('id', 'name', 'role', 'promo', 'profile_image')->get();

        // Envoyer les données des utilisateurs à la vue Inertia
        return Inertia::render('AjoutDesAmis', [
            'users' => $users,
        ]);
    }
}
