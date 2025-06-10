<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\StaffDashboardController;
use App\Http\Controllers\ResidentDashboardController;

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::get('/', function () {
//     return redirect()->route('login');
// });

Route::get('/', function () {
    return Inertia::render('Auth/Login', [
        'canResetPassword' => true,
        'status' => session('status'),
    ]);
});

Route::middleware(['auth', 'verified'])->group(function () {
    
    // Admin Routes
    Route::prefix('admin')->middleware('role:admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        // Add more admin routes here as needed
        // Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
        // Route::get('/settings', [AdminSettingsController::class, 'index'])->name('settings.index');
    });

    // Staff Routes
    Route::prefix('staff')->middleware('role:staff')->name('staff.')->group(function () {
        Route::get('/dashboard', [StaffDashboardController::class, 'index'])->name('dashboard');
        // Add more staff routes here as needed
        // Route::get('/requests', [StaffRequestController::class, 'index'])->name('requests.index');
        // Route::get('/reports', [StaffReportController::class, 'index'])->name('reports.index');
    });

    // Resident Routes
    Route::prefix('resident')->middleware('role:resident')->name('resident.')->group(function () {
        Route::get('/dashboard', [ResidentDashboardController::class, 'index'])->name('dashboard');
        
        // Feedback routes for residents
        Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
        Route::get('/feedback/create', [FeedbackController::class, 'create'])->name('feedback.create');
        Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
        
        // Add more resident routes here as needed
        // Route::get('/requests', [ResidentRequestController::class, 'index'])->name('requests.index');
        // Route::get('/announcements', [ResidentAnnouncementController::class, 'index'])->name('announcements.index');
    });
    
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';