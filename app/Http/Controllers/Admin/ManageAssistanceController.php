<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralIntakeSheet;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;

class ManageAssistanceController extends Controller
{
    public function index()
    {
        $assistanceRequests = GeneralIntakeSheet::with('user')
            ->orderBy('created_at', 'desc')
            ->get();

        return Inertia::render('Admin/ManageAssistance/Index', [
            'assistanceRequests' => $assistanceRequests
        ]);
    }

    public function show($id)
    {
        $assistanceRequest = GeneralIntakeSheet::with('user')->findOrFail($id);
        
        return Inertia::render('Admin/ManageAssistance/Show', [
            'assistanceRequest' => $assistanceRequest
        ]);
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'status' => 'required|in:PENDING,IN_PROGRESS,VERIFIED,REJECTED',
                'social_worker_assistance' => 'nullable|string',
            ]);

            $assistanceRequest = GeneralIntakeSheet::findOrFail($id);
            
            // Update the fields
            $assistanceRequest->status = $validated['status'];
            if (isset($validated['social_worker_assistance'])) {
                $assistanceRequest->social_worker_assistance = $validated['social_worker_assistance'];
            }
            
            $assistanceRequest->save();

            // Return JSON response for AJAX requests
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Assistance request updated successfully.',
                    'data' => $assistanceRequest
                ]);
            }

            return redirect()->back()->with('success', 'Assistance request updated successfully.');
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation failed for assistance request update: ' . json_encode($e->errors()));
            
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed.',
                    'errors' => $e->errors()
                ], 422);
            }
            
            return redirect()->back()->withErrors($e->errors());
            
        } catch (\Exception $e) {
            Log::error('Failed to update assistance request: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to update assistance request.'
                ], 500);
            }
            
            return redirect()->back()->withErrors(['error' => 'Failed to update assistance request.']);
        }
    }

    public function destroy($id)
    {
        try {
            $assistanceRequest = GeneralIntakeSheet::findOrFail($id);
            $assistanceRequest->delete();

            return redirect()->back()->with('success', 'Assistance request deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Failed to delete assistance request: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Failed to delete assistance request.']);
        }
    }

    
    public function export()
    {
        $assistanceRequests = GeneralIntakeSheet::with('user')
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($assistanceRequests);
    }

public function generatePdf($id)
{
    try {
        $assistanceRequest = GeneralIntakeSheet::with('user')->findOrFail($id);
        
        $pdf = Pdf::loadView('pdf.general-intake-sheet', [
            'data' => $assistanceRequest
        ])
        ->setPaper('a4', 'portrait')
        ->setOptions(['defaultFont' => 'sans-serif']);
        
        return $pdf->stream('general-intake-sheet-' . $assistanceRequest->id . '.pdf');
        
    } catch (\Exception $e) {
        Log::error('Failed to generate PDF: ' . $e->getMessage());
        return redirect()->back()->withErrors(['error' => 'Failed to generate PDF.']);
    }
}
}