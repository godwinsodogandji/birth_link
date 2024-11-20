<?php

use App\Http\Controllers\AjoutDesAmisController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AmisSuggererController;
use App\Http\Controllers\AnniversaireAvenirController;
use App\Http\Controllers\AnniversairePasseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ThemepersonController;
use App\Http\Controllers\ThemesPopulairesController;
use App\Models\Friend;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

Route::get('/friends', function () {
    // Récupérez les amis depuis la base de données
    $friends = Friend::all(); // Vous pouvez appliquer des filtres ou des recherches selon vos besoins

    // Retournez les données avec Inertia
    return Inertia::render('Friends', [
        'friends' => $friends,  // Passez les données au composant Vue
    ]);
});

// Routes de connexion et d'inscription protégées par le middleware 'guest'
Route::middleware(['guest'])->group(function () {
    Route::get('/login', function () {
        return Inertia::render('Login');
    })->name('login');

    Route::get('/register', function () {
        return Inertia::render('Register');
    })->name('register');

    Route::post('/login', [AuthenticatedSessionController::class, 'store']);

    Route::post('/register', [RegisteredUserController::class, 'store']);
});
Route::post('/logout', [AuthenticatedSessionController::class, 'logout'])->name('logout');


// Routes accessibles uniquement pour les utilisateurs authentifiés
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/ajoutdesamis', [AjoutDesAmisController::class, 'index'])->name('ajoutdesamis');
    // dd('les amis sont ici');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/edit', [ProfileController::class, 'update']);
});

Route::get('/theme', [ThemepersonController::class, 'index'])->name('theme');


Route::get('/ajoutdesamis', [AjoutDesAmisController::class, 'index'])->name('ajoutdesamis');
Route::get('/suggestion-des-amis', [AmisSuggererController::class, 'index'])->name('suggestion-des-amis');

Route::get('/notification', [NotificationController::class, 'index'])->name('notification');

Route::get('/anniversaire-avenir', [AnniversaireAvenirController::class, 'index'])->name('anniversaire-avenir');
Route::get('/anniversaire-passe', [AnniversairePasseController::class, 'index'])->name('anniversaire-passe');

Route::get('/confirmation-des-amis', [AmisSuggererController::class, 'confirmation'])->name('confirmation-des-amis');
Route::get('/friends', [FriendController::class, 'index'])->name('friends');

Route::get('/themespopulaires', [ThemesPopulairesController::class, 'index'])->name('themespopulaires');

Route::post('/store/theme-poulaires', [ThemesPopulairesController::class, 'store'])->name('store-theme');
Route::get('/themes-populaires', [ThemesPopulairesController::class, 'getCards'])->name('themes-populaires');
