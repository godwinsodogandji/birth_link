<?php

use App\Http\Controllers\FriendshipController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    // Demander une amitié
    Route::post('/friends/{friendId}/request', [FriendshipController::class, 'sendFriendRequest']);
    
    // Accepter une demande d'amitié
    Route::post('/friends/{friendId}/accept', [FriendshipController::class, 'acceptFriendRequest']);
    
    // Rejeter une demande d'amitié
    Route::post('/friends/{friendId}/reject', [FriendshipController::class, 'rejectFriendRequest']);
    
    // Bloquer un utilisateur
    Route::post('/friends/{friendId}/block', [FriendshipController::class, 'blockUser']);
    
    // Retirer un ami
    Route::post('/friends/{friendId}/remove', [FriendshipController::class, 'removeFriend']);
    
    // Afficher les amis acceptés
    Route::get('/friends', [FriendshipController::class, 'index']);
    
    // Afficher les demandes d'amis envoyées
    Route::get('/friends/requests/sent', [FriendshipController::class, 'sentFriendRequests']);
    
    // Afficher les demandes d'amis en attente
    Route::get('/friends/requests/pending', [FriendshipController::class, 'pendingFriendRequests']);
});
