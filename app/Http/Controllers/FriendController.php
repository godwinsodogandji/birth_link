<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class FriendController extends Controller
{
    public function index()
    {
        return Inertia::render('FriendListe');
    }

   
}
