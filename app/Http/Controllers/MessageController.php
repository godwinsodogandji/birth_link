<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
 

    // Enregistre un nouveau message dans la base de données
    public function store(Request $request)
    {
         // Validation des données
         $validated = $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required|string',
            'color' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        // Gestion de l'upload d'image si nécessaire
        if ($request->hasFile('photo')) {
            $path = $request->file('background_image')->store('photo', 'public');
            $validated['photo'] = $path;
        }

        // Création du message dans la base de données
        $text = Message::create($validated);

        // Retourner une réponse appropriée
        return response()->json(['message' => 'Message saved successfully!', 'data' => $text], 201);
    }
}
