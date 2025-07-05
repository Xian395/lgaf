<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Issue;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\IssuesExport;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ManageReportController extends Controller
{
    public function index()
    {
        $issues = Issue::with(relations: 'user')
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($issue) {
                $filePath = null;
                if ($issue->file_path) {
                    if (Storage::disk('public')->exists($issue->file_path)) {
                        $filePath = asset('storage/' . $issue->file_path);
                    }
                }

                return [
                    'id' => $issue->id,
                    'type' => $issue->type,
                    'description' => $issue->description,
                    'location' => $issue->location,
                    'file_path' => $filePath,
                    'status' => $issue->status ?? 'pending',
                    'user_name' => $issue->user->name ?? 'Unknown',
                    'created_at' => $issue->created_at->format('Y-m-d H:i:s'),
                ];
            });

        return Inertia::render('Admin/ManageReport/Index', [
            'issues' => $issues,
            'issueTypes' => ['pothole', 'streetlight', 'waste', 'water', 'other'],
            'statuses' => ['pending', 'in_progress', 'resolved'],
        ]);
    }

    public function updateStatus(Request $request, Issue $issue)
    {
        try {
            Log::info('Status update request received', [
                'issue_id' => $issue->id,
                'current_status' => $issue->status,
                'new_status' => $request->status,
                'request_data' => $request->all()
            ]);

            $validated = $request->validate([
                'status' => ['required', 'string', 'in:pending,in_progress,resolved'],
            ]);

            $oldStatus = $issue->status;
            $issue->update(['status' => $validated['status']]);

            Log::info('Status updated successfully', [
                'issue_id' => $issue->id,
                'old_status' => $oldStatus,
                'new_status' => $issue->status
            ]);

            return redirect()->back()->with('success', 'Issue status updated successfully.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation error in status update', [
                'issue_id' => $issue->id,
                'errors' => $e->errors(),
                'request_data' => $request->all()
            ]);

            return redirect()->back()->withErrors($e->errors())->with('error', 'Validation failed.');

        } catch (\Exception $e) {
            Log::error('Error updating issue status', [
                'issue_id' => $issue->id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()->with('error', 'An error occurred while updating the status.');
        }
    }

    public function export()
    {
        try {
            return Excel::download(new IssuesExport, 'issues.xlsx');
        } catch (\Exception $e) {
            Log::error('Error exporting issues', [
                'error' => $e->getMessage()
            ]);
            
            return back()->with('error', 'Error exporting data. Please try again.');
        }
    }
}