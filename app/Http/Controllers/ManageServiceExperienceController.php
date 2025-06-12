<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class ManageServiceExperienceController extends Controller
{
       public function index()
    {
        return Inertia::render('Admin/ServiceFeedback/Index');
    }

}
