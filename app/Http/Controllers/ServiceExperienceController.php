<?php

namespace App\Http\Controllers;

use App\Models\ServiceExperience;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class ServiceExperienceController extends Controller
{
    public function index()
    {
        return Inertia::render('Resident/Experience/Index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'rating' => 'required|integer|between:1,5',
            'courteous_staff' => 'required|in:Yes,No,Somewhat',
            'completion_time' => 'required|in:Less than 10 minutes,10–30 minutes,More than 30 minutes,I didn’t complete it',
            'easy_to_understand' => 'required|in:Yes,No,Somewhat',
        ]);

        ServiceExperience::create([
            'user_id' => Auth::id(),
            'rating' => $validated['rating'],
            'courteous_staff' => $validated['courteous_staff'],
            'completion_time' => $validated['completion_time'],
            'easy_to_understand' => $validated['easy_to_understand'],
        ]);

        return redirect()->route('resident.dashboard')->with('success', 'Service experience submitted successfully.');
    }
}