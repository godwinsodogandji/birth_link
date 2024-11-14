<?php

use App\Http\Controllers\AjoutDesAmisController;
use App\Http\Controllers\AmisSuggererController;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\FriendController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ajoutdesamis', [AjoutDesAmisController::class, 'index'])->name('ajoutdesamis');
Route::get('/dashboard', [DashbordController::class, 'index'])->name('dashbord');
Route::get('/suggestion-des-amis', [AmisSuggererController::class, 'index'])->name('suggestion-des-amis');
Route::get('/friends', [FriendController::class, 'index'])->name('friends');
<?php

use App\Http\Controllers\AjoutDesAmisController;
use App\Http\Controllers\AmisSuggererController;
use App\Http\Controllers\AnniversaireAvenirController;
use App\Http\Controllers\AnniversairePasseController;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ajoutdesamis', [AjoutDesAmisController::class, 'index'])->name('ajoutdesamis');
Route::get('/dashboard', [DashbordController::class, 'index'])->name('dashbord');
Route::get('/notification', [NotificationController::class, 'index'])->name('notification');
Route::get('/anniversaire-avenir', [AnniversaireAvenirController::class, 'index'])->name('anniversaire-avenir');
Route::get('/anniversaire-passe', [AnniversairePasseController::class, 'index'])->name('anniversaire-passe');

Route::get('/suggestion-des-amis', [AmisSuggererController::class, 'index'])->name('suggestion-des-amis');