<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AjoutDesAmisController extends Controller
{
    public function index()
    {
        $users = User::all();
        // dd($users);
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
}
