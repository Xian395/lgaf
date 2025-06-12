<?php

namespace App\Http\Controllers\Resident;

use App\Http\Controllers\Controller;

use Inertia\Inertia;

class ResidentDashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('Resident/ResidentDashboard');
    }
}