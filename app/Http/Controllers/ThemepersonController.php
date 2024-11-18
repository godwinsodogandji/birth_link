<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ThemepersonController extends Controller
{
    public function index()
    {
        return Inertia::render('Themeperson');
    }

   
}
