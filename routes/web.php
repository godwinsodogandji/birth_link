<?php

use App\Http\Controllers\AjoutDesAmisController;
use App\Http\Controllers\AmisSuggererController;
use App\Http\Controllers\DashbordController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ajoutdesamis', [AjoutDesAmisController::class, 'index'])->name('ajoutdesamis');
Route::get('/dashboard', [DashbordController::class, 'index'])->name('dashbord');
Route::get('/suggestion-des-amis', [AmisSuggererController::class, 'index'])->name('suggestion-des-amis');