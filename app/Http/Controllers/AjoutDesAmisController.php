<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\FriendRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AjoutDesAmisController extends Controller
{
    // Affiche la liste des utilisateurs
    public function index()
    {
        $users = User::all();

        return Inertia::render('AjoutDesAmis', [
            'users' => $users->map(function ($user) {
                return [
                    'id' => $user->id,
                    'username' => $user->username,
                    'profile_picture' => $user->profile_picture,
                    'email' => $user->email,
                    'date_of_birth' => $user->date_of_birth,
                    'email_verified' => $user->email_verified,
                    'promo' => $user->promo,
                ];
            }),
        ]);
    }

    // Envoyer une demande d'ami
    public function sendFriendRequest(Request $request, $userId)
    {
        $currentUser = Auth::user();

        // Vérifier si l'utilisateur tente d'ajouter lui-même
        if ($currentUser->id == $userId) {
            return back()->with('error', "Vous ne pouvez pas vous ajouter en tant qu'ami.");
        }

        // Vérifier si une demande existe déjà
        $existingRequest = FriendRequest::where('sender_id', $currentUser->id)
            ->where('receiver_id', $userId)
            ->orWhere(function ($query) use ($currentUser, $userId) {
                $query->where('sender_id', $userId)
                    ->where('receiver_id', $currentUser->id);
            })
            ->first();

        if ($existingRequest) {
            return back()->with('error', "Une demande d'ami existe déjà.");
        }

        // Créer une nouvelle demande d'ami
        FriendRequest::create([
            'sender_id' => $currentUser->id,
            'receiver_id' => $userId,
            'status' => 'pending', // Statut de la demande
        ]);

        return back()->with('success', 'Demande d\'ami envoyée avec succès.');
    }

    // Accepter une demande d'ami


    // Refuser une demande d'ami
    public function rejectFriendRequest($requestId)
    {
        $friendRequest = FriendRequest::findOrFail($requestId);

        // Vérifier si la demande est envoyée à l'utilisateur connecté
        if ($friendRequest->receiver_id != Auth::id()) {
            return back()->with('error', "Vous ne pouvez pas refuser cette demande.");
        }

        // Mettre à jour le statut de la demande à 'rejected'
        $friendRequest->update(['status' => 'rejected']);

        return back()->with('success', 'Demande d\'ami refusée.');
    }

    // Supprimer un ami


    // Afficher la liste des amis
    public function showFriends()
    {
        $currentUser = Auth::user();

        // Récupérer les amis de l'utilisateur connecté
        $friends = $currentUser->friends;

        return Inertia::render('MesAmis', [
            'friends' => $friends->map(function ($friend) {
                return [
                    'id' => $friend->id,
                    'username' => $friend->username,
                    'profile_picture' => $friend->profile_picture,
                    'email' => $friend->email,
                    'date_of_birth' => $friend->date_of_birth,
                    'email_verified' => $friend->email_verified,
                    'promo' => $friend->promo,
                ];
            }),
        ]);
    }
}
