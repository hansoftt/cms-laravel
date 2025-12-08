<?php

use App\Http\Controllers\Admin\ContactSettingsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Authentication routes (login and password reset only)
Auth::routes([
    'register' => false,
    'verify' => false,
    'reset' => true
]);

// Protected routes (require authentication)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    // Admin routes group (you can add more admin routes here)
    Route::prefix('admin')->name('admin.')->group(function () {
        // Dashboard is already handled by /dashboard route
        // Add more admin routes here as needed
        // Route::get('/users', [UserController::class, 'index'])->name('users');
        // Route::get('/settings', [SettingsController::class, 'index'])->name('settings');

        // Settings Routes
        Route::prefix('settings')->name('settings.')->group(function () {
            // Contact Settings
            Route::get('/contact', [ContactSettingsController::class, 'index'])->name('contact.index');
            Route::put('/contact', [ContactSettingsController::class, 'update'])->name('contact.update');
        });

        // Page Management Routes
        Route::resource('pages', PageController::class);
        Route::post('pages/upload-content-image', [PageController::class, 'uploadContentImage'])->name('pages.upload-content-image');
        Route::post('pages/upload-header-image', [PageController::class, 'uploadHeaderImage'])->name('pages.upload-header-image');

        // Menu Management Routes
        Route::resource('menus', MenuController::class);
    });
});

// Public routes (must be at the bottom to avoid conflicts)
// Dynamic page routes - must be at the bottom after all other routes
Route::get('/{slug?}', [PageController::class, 'show'])
    ->where('slug', '^[a-zA-Z0-9-_]+$')
    ->name('pages.show');

Route::post('/contact', [ContactController::class, 'contact']);
