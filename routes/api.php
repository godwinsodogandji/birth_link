<?php

use App\Http\Controllers\FriendController;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->group(function () {
    // Demander une amitié
    Route::post('/friends/{friendId}/request', [FriendController::class, 'sendFriendRequest']);
    
    // Accepter une demande d'amitié
    Route::post('/friends/{friendId}/accept', [FriendController::class, 'acceptFriendRequest']);
    
    // Rejeter une demande d'amitié
    Route::post('/friends/{friendId}/reject', [FriendController::class, 'rejectFriendRequest']);
    
    // Bloquer un utilisateur
    Route::post('/friends/{friendId}/block', [FriendController::class, 'blockUser']);
    
    // Retirer un ami
    Route::post('/friends/{friendId}/remove', [FriendController::class, 'removeFriend']);
    
    // Afficher les amis acceptés
    Route::get('/friends', [FriendController::class, 'index']);
    
    // Afficher les demandes d'amis envoyées
    Route::get('/friends/requests/sent', [FriendController::class, 'sentFriendRequests']);
    
    // Afficher les demandes d'amis en attente
    Route::get('/friends/requests/pending', [FriendController::class, 'pendingFriendRequests']);
// });
