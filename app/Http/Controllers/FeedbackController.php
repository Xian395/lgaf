<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function index()
    {
        return Inertia::render('Resident/Feedback/Index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'age' => 'required|integer|min:1',
            'gender' => 'required|in:male,female,other',
            'barangay' => 'required|string|max:255',
            'rating' => 'required|integer|between:1,5',
            'service_used' => 'required|array|min:1',
            'service_used.*' => 'in:Burial,Food Supply,Medical,Educational Assistance,Senior Citizen',
            'suggestions' => 'nullable|string|max:1000',
        ]);

        Feedback::create([
            'user_id' => Auth::id(),
            'full_name' => $validated['full_name'],
            'age' => $validated['age'],
            'gender' => $validated['gender'],
            'barangay' => $validated['barangay'],
            'rating' => $validated['rating'],
            'service_used' => $validated['service_used'],
            'suggestions' => $validated['suggestions'],
        ]);

        return redirect()->route('resident.dashboard')->with('success', 'Feedback submitted successfully.');
    }
}