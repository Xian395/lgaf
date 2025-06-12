<?php

namespace App\Http\Controllers\Resident;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MyRequestController extends Controller
{
       public function index()
    {
        return Inertia::render('Resident/MyRequest/Index');
    }

}
