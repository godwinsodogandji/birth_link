<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use Inertia\Inertia;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // Récupérer la page demandée dans la requête AJAX
            $page = $request->input('page', 1); // Par défaut, la page 1 si non spécifié

            // Charger les amis paginés pour la page donnée
            $friends = Friend::orderBy('name')->paginate(6, ['*'], 'page', $page);

            // Retourner les amis au format JSON (réponse AJAX)
            return response()->json($friends);
        }

        // Vue initiale pour la page 1
        $friends = Friend::orderBy('name')->paginate(6);

        return Inertia::render('FriendListe', [
            'friends' => $friends
        ]);
    }
}
