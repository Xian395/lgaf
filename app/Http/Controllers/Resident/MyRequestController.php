<?php

namespace App\Http\Controllers\Resident;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Issue;
use App\Models\GeneralIntakeSheet; 

class MyRequestController extends Controller
{
    public function index(Request $request)
    {
        $issues = Issue::where('user_id', $request->user()->id)
            ->select('id', 'type', 'description', 'status' ,'location', 'file_path', 'created_at', 'updated_at')
            ->get();

        
        $intakeSheets = GeneralIntakeSheet::where('user_id', $request->user()->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return Inertia::render('Resident/MyRequest/Index', [
            'issues' => $issues,
            'intakeSheets' => $intakeSheets, 
        ]);
    }
}