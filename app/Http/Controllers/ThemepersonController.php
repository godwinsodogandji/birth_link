<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ThemepersonController extends Controller
{
    public function index()
    {
        return Inertia::render('Themeperson');
    }
    public function sendMessage(Request $request)
    {
        // Validation des données
        $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required|string|max:800',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation pour l'image
        ]);

        // Gérer l'upload de l'image si elle est présente
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        // // Créer un message dans la base de données
        // $message = Message::create([
        //     'title' => $request->input('title'),
        //     'text' => $request->input('text'),
        //     'image' => $imagePath, // Enregistrer le chemin de l'image si elle existe
        // ]);


}
}
