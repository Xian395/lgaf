<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class ResidentDashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('Resident/ResidentDashboard');
    }
}