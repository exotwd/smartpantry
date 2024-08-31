<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PantryController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::post('/pantry', [PantryController::class, 'store'])->name('pantry.store');
    Route::get('/pantry', [PantryController::class, 'index'])->name('pantry.index');
    Route::get('/pantry/{id}', [PantryController::class, 'show'])->name('pantry.show');
    Route::put('/pantry/{id}', [PantryController::class, 'update'])->name('pantry.update');
    Route::delete('/pantry/{id}', [PantryController::class, 'destroy'])->name('pantry.destroy');
});
