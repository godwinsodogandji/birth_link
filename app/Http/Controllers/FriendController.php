<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FriendController extends Controller
{
    public function index()
    {
        return Inertia::render('FriendListe');
    }

    public function sendFriendRequest(Request $request, $friendId)
    {
        $user = $request->user();
        $friend = User::findOrFail($friendId);

        // Vérifier si la demande d'amitié existe déjà
        if ($user->friends()->wherePivot('friend_id', $friend->id)->exists()) {
            return response()->json(['message' => 'Vous êtes déjà amis ou la demande est en attente.'], 400);
        }

        // Envoyer la demande d'amitié
        $user->sendFriendRequest($friend);
        return response()->json(['message' => 'Demande d\'amitié envoyée.']);
    }

    public function acceptFriendRequest(Request $request, $friendId)
    {
        $user = $request->user();
        $friend = User::findOrFail($friendId);

        // Accepter la demande d'amitié
        $user->acceptFriendRequest($friend);
        return response()->json(['message' => 'Demande d\'amitié acceptée.']);
    }

    public function rejectFriendRequest(Request $request, $friendId)
    {
        $user = $request->user();
        $friend = User::findOrFail($friendId);

        // Rejeter la demande d'amitié
        $user->rejectFriendRequest($friend);
        return response()->json(['message' => 'Demande d\'amitié rejetée.']);
    }

    public function blockUser(Request $request, $friendId)
    {
        $user = $request->user();
        $friend = User::findOrFail($friendId);

        // Bloquer l'utilisateur
        $user->blockUser($friend);
        return response()->json(['message' => 'Utilisateur bloqué.']);
    }

    public function removeFriend(Request $request, $friendId)
    {
        $user = $request->user();
        $friend = User::findOrFail($friendId);

        // Retirer l'ami
        $user->removeFriend($friend);
        return response()->json(['message' => 'Ami retiré.']);
    }

    public function show(Request $request)
    {
        $user = $request->user();
        $friends = $user->friends; // Liste des amis acceptés
        return response()->json($friends);
    }

    public function pendingFriendRequests(Request $request)
    {
        $user = $request->user();
        $pendingRequests = $user->pendingFriends;
        return response()->json($pendingRequests);
    }

    public function sentFriendRequests(Request $request)
    {
        $user = $request->user();
        $sentRequests = $user->sentFriendRequests;
        return response()->json($sentRequests);
    }
}
