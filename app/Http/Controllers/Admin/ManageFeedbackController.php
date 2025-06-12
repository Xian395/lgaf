<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ManageFeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return Inertia::render('Admin/ManageFeedback/Index', [
            'feedbacks' => $feedbacks,
            'stats' => [
                'total_feedbacks' => Feedback::count(),
                'average_rating' => round(Feedback::avg('rating'), 1),
                'recent_feedbacks' => Feedback::where('created_at', '>=', now()->subDays(7))->count(),
                'rating_distribution' => [
                    '5' => Feedback::where('rating', 5)->count(),
                    '4' => Feedback::where('rating', 4)->count(),
                    '3' => Feedback::where('rating', 3)->count(),
                    '2' => Feedback::where('rating', 2)->count(),
                    '1' => Feedback::where('rating', 1)->count(),
                ]
            ]
        ]);
    }

    public function show(Feedback $feedback)
    {
        $feedback->load('user');
        
        return Inertia::render('Admin/ManageFeedback/Show', [
            'feedback' => $feedback
        ]);
    }

    public function destroy(Feedback $feedback)
    {
        $feedback->delete();

        return redirect()->route('admin.manage-feedback.index')
            ->with('success', 'Feedback deleted successfully.');
    }

    public function export()
    {
        $feedbacks = Feedback::with('user')
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($feedback) {
                return [
                    'ID' => $feedback->id,
                    'Full Name' => $feedback->full_name,
                    'Age' => $feedback->age,
                    'Gender' => ucfirst($feedback->gender),
                    'Barangay' => $feedback->barangay,
                    'Rating' => $feedback->rating,
                    'Services Used' => implode(', ', $feedback->service_used),
                    'Suggestions' => $feedback->suggestions,
                    'Submitted Date' => $feedback->created_at->format('Y-m-d H:i:s'),
                    'User Email' => optional($feedback->user)->email,
                ];
            });

        $filename = 'feedbacks_export_' . now()->format('Y_m_d_H_i_s') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $callback = function() use ($feedbacks) {
            $file = fopen('php://output', 'w');
            
            // Add CSV headers
            if ($feedbacks->isNotEmpty()) {
                fputcsv($file, array_keys($feedbacks->first()));
            }
            
            // Add data rows
            foreach ($feedbacks as $feedback) {
                fputcsv($file, $feedback);
            }
            
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}