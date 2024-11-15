<?php

use App\Http\Controllers\AjoutDesAmisController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AmisSuggererController;
use App\Http\Controllers\FriendController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return view('welcome');

});
Route::get('/login', function () {
    return Inertia::render('Login');
})->name('login');

Route::get('/register', function () {
    return Inertia::render('Register');
})->name('register');

Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/ajoutdesamis', [AjoutDesAmisController::class, 'index'])->name('ajoutdesamis');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/suggestion-des-amis', [AmisSuggererController::class, 'index'])->name('suggestion-des-amis');
Route::get('/confirmation-des-amis', [AmisSuggererController::class, 'confirmation'])->name('confirmation-des-amis');
Route::get('/friends', [FriendController::class, 'index'])->name('friends');
