<?php

use App\Http\Controllers\AjoutDesAmisController;
use App\Http\Controllers\AmisSuggererController;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\ThemepersonController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ajoutdesamis', [AjoutDesAmisController::class, 'index'])->name('ajoutdesamis');
Route::get('/dashboard', [DashbordController::class, 'index'])->name('dashbord');
Route::get('/suggestion-des-amis', [AmisSuggererController::class, 'index'])->name('suggestion-des-amis');
Route::get('/confirmation-des-amis', [AmisSuggererController::class, 'confirmation'])->name('confirmation-des-amis');
Route::get('/friends', [FriendController::class, 'index'])->name('friends');
Route::get('/theme', [ThemepersonController::class, 'index'])->name('theme');