<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class ManageFeedbackController extends Controller
{
        public function index()
    {
        return Inertia::render('Admin/ManageFeedback/Index');
    }

}
