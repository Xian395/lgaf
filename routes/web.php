<?php

use App\Http\Controllers\Admin\ManageReportController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;

use App\Http\Controllers\ProfileController;


use App\Http\Controllers\StaffDashboardController;

use App\Http\Controllers\Resident\AboutController;
use App\Http\Controllers\Resident\FeedbackController;
use App\Http\Controllers\Resident\MyRequestController;
use App\Http\Controllers\Resident\AssistanceController;
use App\Http\Controllers\Resident\ResidentDashboardController;
use App\Http\Controllers\Resident\ServiceExperienceController;
use App\Http\Controllers\Resident\GeneralIntakeSheetController;
use App\Http\Controllers\Resident\ReportIssueController;


use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\ManageFeedbackController;
use App\Http\Controllers\Admin\ManageAssistanceController;
use App\Http\Controllers\Admin\ManageServiceExperienceController;

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
        Route::delete('/feedback/{feedback}', [ManageFeedbackController::class, 'destroy'])->name('feedback.destroy');

    Route::get('/assistance', [ManageAssistanceController::class, 'index'])->name('assistance.index');
    Route::get('/assistance/{id}', [ManageAssistanceController::class, 'show'])->name('assistance.show');
    Route::put('/assistance/{id}', [ManageAssistanceController::class, 'update'])->name('assistance.update');
    Route::delete('/assistance/{id}', [ManageAssistanceController::class, 'destroy'])->name('assistance.destroy');
    Route::get('/assistance/export', [ManageAssistanceController::class, 'export'])->name('assistance.export');
        Route::get('/assistance/{id}/pdf', [ManageAssistanceController::class, 'generatePdf'])->name('assistance.pdf');
         Route::get('/assistance/{id}/download', [ManageAssistanceController::class, 'downloadPdf'])->name('assistance.download');

        Route::get('/service', [ManageServiceExperienceController::class, 'index'])->name('service.index');
        Route::delete('/service/{experience}', [ManageServiceExperienceController::class, 'destroy'])->name('service.destroy');

        Route::get('/report', [ManageReportController::class, 'index'])->name('report.index');
        Route::put('/report/{issue}/update-status', [ManageReportController::class, 'updateStatus'])->name('report.updateStatus');
        Route::get('/report/export', [ManageReportController::class, 'export'])->name('report.export');
        Route::delete('/report/{report}', [ManageReportController::class, 'destroy'])->name('report.destroy');
    });

    // Staff Routes
    Route::prefix('staff')->middleware('role:staff')->name('staff.')->group(function () {
        Route::get('/dashboard', [StaffDashboardController::class, 'index'])->name('dashboard');
    });

    // Resident Routes
    Route::prefix('resident')->middleware('role:resident')->name('resident.')->group(function () {
        Route::get('/dashboard', [ResidentDashboardController::class, 'index'])->name('dashboard');

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


        Route::get('/report', [ReportIssueController::class, 'index'])->name('report.index');
        Route::post('/report', [ReportIssueController::class, 'store'])->name('report.store');


        Route::get('/myrequest', [MyRequestController::class, 'index'])->name('myrequest.index');
        

        Route::get('/about', [AboutController::class, 'index'])->name('about.index');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
