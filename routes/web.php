<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\AssistanceController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ManageFeedbackController;
use App\Http\Controllers\StaffDashboardController;
use App\Http\Controllers\ManageAssistanceController;
use App\Http\Controllers\ResidentDashboardController;
use App\Http\Controllers\ServiceExperienceController;
use App\Http\Controllers\GeneralIntakeSheetController;
use App\Http\Controllers\ManageServiceExperienceController;

Route::get('/', function () {
    return Inertia::render('Auth/Login', [
        'canResetPassword' => true,
        'status' => session('status'),
    ]);
});


Route::get('/register', function () {
    return Inertia::render('Auth/Register');
})->name('register');



Route::middleware(['auth', 'verified'])->group(function () {
    
    // Admin Routes
    Route::prefix('admin')->middleware('role:admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        
         Route::get('/feedback', [ManageFeedbackController::class, 'index'])->name('feedback.index');
          Route::get('/assistance', [ManageAssistanceController::class, 'index'])->name('assistance.index');
           Route::get('/service', [ManageServiceExperienceController::class, 'index'])->name('service.index');
        // Add more admin routes here as needed
    });

    // Staff Routes
    Route::prefix('staff')->middleware('role:staff')->name('staff.')->group(function () {
        Route::get('/dashboard', [StaffDashboardController::class, 'index'])->name('dashboard');
        // Add more staff routes here as needed
    });

    // Resident Routes
    Route::prefix('resident')->middleware('role:resident')->name('resident.')->group(function () {
        // Fixed: Remove the duplicate 'resident.' prefix
        Route::get('/dashboard', [ResidentDashboardController::class, 'index'])->name('dashboard');
        
        // Feedback routes for residents
        Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
        Route::get('/feedback/create', [FeedbackController::class, 'create'])->name('feedback.create');
        Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
        
        Route::get('/assistance', [AssistanceController::class, 'index'])->name('assistance.index');
        Route::get('/assistance/create', [AssistanceController::class, 'create'])->name('assistance.create');
        Route::post('/assistance', [AssistanceController::class, 'store'])->name('assistance.store');

        Route::get('/experience', [ServiceExperienceController::class, 'index'])->name('experience.index');
        Route::get('/experience/create', [ServiceExperienceController::class, 'create'])->name('experience.create');
        Route::post('/experience', [ServiceExperienceController::class, 'store'])->name('experience.store');

        Route::get('/assistance', [GeneralIntakeSheetController::class, 'index'])->name('assistance.index');
        Route::get('/assistance/create', [GeneralIntakeSheetController::class, 'create'])->name('assistance.create');
        Route::post('/assistance', [GeneralIntakeSheetController::class, 'store'])->name('assistance.store');



        Route::get('/about', [AboutController::class, 'index'])->name('about.index');

    });
    
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';