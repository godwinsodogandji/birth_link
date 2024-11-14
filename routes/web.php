<?php

use App\Http\Controllers\AjoutDesAmisController;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\FriendController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ajoutdesamis', [AjoutDesAmisController::class, 'index'])->name('ajoutdesamis');
Route::get('/dashboard', [DashbordController::class, 'index'])->name('dashbord');
Route::get('/friends', [FriendController::class, 'index'])->name('friends');