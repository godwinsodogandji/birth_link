<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Afficher le tableau de bord.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        // Retourner la vue Vue.js via Inertia
        return Inertia::render('Dashboard'); // Nom de la vue Vue
    }
}
