<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceExperience;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ManageServiceExperienceController extends Controller
{
    public function index()
    {
        $experiences = ServiceExperience::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return Inertia::render('Admin/ServiceExperienceFeedback/Index', [
            'experiences' => $experiences,
            'stats' => [
                'total_responses' => ServiceExperience::count(),
                'average_rating' => round(ServiceExperience::avg('rating'), 1),
                'recent_responses' => ServiceExperience::where('created_at', '>=', now()->subDays(7))->count(),
                'satisfaction_metrics' => [
                    'courteous_staff' => [
                        'Yes' => ServiceExperience::where('courteous_staff', 'Yes')->count(),
                        'No' => ServiceExperience::where('courteous_staff', 'No')->count(),
                        'Somewhat' => ServiceExperience::where('courteous_staff', 'Somewhat')->count(),
                    ],
                    'easy_to_understand' => [
                        'Yes' => ServiceExperience::where('easy_to_understand', 'Yes')->count(),
                        'No' => ServiceExperience::where('easy_to_understand', 'No')->count(),
                        'Somewhat' => ServiceExperience::where('easy_to_understand', 'Somewhat')->count(),
                    ],
                    'completion_time' => [
                        'Less than 10 minutes' => ServiceExperience::where('completion_time', 'Less than 10 minutes')->count(),
                        '10–30 minutes' => ServiceExperience::where('completion_time', '10–30 minutes')->count(),
                        'More than 30 minutes' => ServiceExperience::where('completion_time', 'More than 30 minutes')->count(),
                        'I did not complete it' => ServiceExperience::where('completion_time', 'I did not complete it')->count(),
                    ]
                ],
                'rating_distribution' => [
                    '5' => ServiceExperience::where('rating', 5)->count(),
                    '4' => ServiceExperience::where('rating', 4)->count(),
                    '3' => ServiceExperience::where('rating', 3)->count(),
                    '2' => ServiceExperience::where('rating', 2)->count(),
                    '1' => ServiceExperience::where('rating', 1)->count(),
                ]
            ]
        ]);
    }

    public function show(ServiceExperience $experience)
    {
        $experience->load('user');
        
        return Inertia::render('Admin/ServiceFeedback/Show', [
            'experience' => $experience
        ]);
    }

public function destroy(ServiceExperience $experience)
{
    $experience->delete();

    return redirect()->route('admin.service.index')
        ->with('success', 'Service experience feedback deleted successfully.');
}

    public function export()
    {
        $experiences = ServiceExperience::with('user')
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($experience) {
                return [
                    'ID' => $experience->id,
                    'Rating' => $experience->rating,
                    'Courteous Staff' => $experience->courteous_staff,
                    'Completion Time' => $experience->completion_time,
                    'Easy to Understand' => $experience->easy_to_understand,
                    'Submitted Date' => $experience->created_at->format('Y-m-d H:i:s'),
                    'User Email' => optional($experience->user)->email,
                ];
            });

        $filename = 'service_experience_export_' . now()->format('Y_m_d_H_i_s') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $callback = function() use ($experiences) {
            $file = fopen('php://output', 'w');
            
            if ($experiences->isNotEmpty()) {
                fputcsv($file, array_keys($experiences->first()));
            }
            
            foreach ($experiences as $experience) {
                fputcsv($file, $experience);
            }
            
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function analytics()
    {
        return Inertia::render('Admin/ServiceFeedback/Analytics', [
            'analytics' => [
                'monthly_ratings' => ServiceExperience::selectRaw('MONTH(created_at) as month, AVG(rating) as avg_rating')
                    ->whereYear('created_at', now()->year)
                    ->groupBy('month')
                    ->orderBy('month')
                    ->get(),
                'staff_courtesy_trend' => ServiceExperience::selectRaw('DATE(created_at) as date, courteous_staff, COUNT(*) as count')
                    ->where('created_at', '>=', now()->subDays(30))
                    ->groupBy('date', 'courteous_staff')
                    ->orderBy('date')
                    ->get(),
                'completion_time_analysis' => ServiceExperience::selectRaw('completion_time, COUNT(*) as count, AVG(rating) as avg_rating')
                    ->groupBy('completion_time')
                    ->get(),
            ]
        ]);
    }
}