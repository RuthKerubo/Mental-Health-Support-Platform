<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\FeedbackController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public routes
Route::get('/', function () {
    return view('welcome');
});

// Authentication routes
require __DIR__ . '/auth.php';

// Authenticated routes
Route::middleware(['auth'])->group(function () {
    // Routes for all authenticated users
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin routes
    Route::middleware(['role:admin'])->prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            return 'Admin Dashboard';
        })->name('admin.dashboard');
        
        // Add other admin-specific routes here
    });

    // User routes
    Route::middleware(['role:user'])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');


        Route::get('/resources', [ResourceController::class, 'index'])->name('resources.index');
        Route::get('/resources/{resource}', [ResourceController::class, 'show'])->name('resources.show');
        Route::post('/resources/{resource}/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
    
        Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
        Route::get('/resources/{resource}/feedback/create', [FeedbackController::class, 'create'])->name('feedback.create');
        Route::post('/resources/{resource}/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
        
    });
});

// Filament routes (if you're using Filament for admin panel)
Route::prefix('admin')->group(function () {
    // This assumes Filament is handling its own routing and authentication
    // If not, you may need to add middleware here
});


