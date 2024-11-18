<?php

namespace App\Http\Controllers;
use Inertia\Inertia;

use Illuminate\Http\Request;

class AnniversairePasseController extends Controller
{
    function index(){
        return Inertia::render(component:'AnniversairePasse');
    }
}
