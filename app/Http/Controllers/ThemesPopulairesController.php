<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ThemesPopulairesController extends Controller
{
    public function index()
    {
        return Inertia::render('ThemesPopulaires'); // La vue contenant le composant Vue
    }

    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Sauvegarder l'image dans le dossier public/images
        $imagePath = $request->file('image')->move(public_path('images'), $request->file('image')->getClientOriginalName());

        // Enregistrer les données dans la base de données
        $card = Card::create([
            'description' => $validated['description'],
            'image_path' => 'images/' . $request->file('image')->getClientOriginalName(), // Chemin relatif de l'image
        ]);

        // Retourner une réponse JSON avec succès
        return Inertia::render('ThemesPopulaires', [
            'message' => 'Carte créée avec succès',
            'card' => $card
        ]);
    }
}
