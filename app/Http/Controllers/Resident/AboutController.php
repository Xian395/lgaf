<?php

namespace App\Http\Controllers\Resident;

use App\Http\Controllers\Controller;

use Inertia\Inertia;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return Inertia::render('Resident/About/Index');
    }
}
