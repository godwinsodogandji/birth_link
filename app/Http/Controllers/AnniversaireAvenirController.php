<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AnniversaireAvenirController extends Controller
{
    public function index()
    {
        return inertia::render(component: 'AnniversaireAvenir');
    }
}
