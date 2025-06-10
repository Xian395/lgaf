<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class AssistanceController extends Controller
{
      public function index()
    {
        return Inertia::render('Resident/Assistance/Index');
    }
}
