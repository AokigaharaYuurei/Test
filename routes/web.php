<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Middleware\Admin;
use App\Models\Report;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/create', [ReportController::class, 'create'])->name('reports.create');
    Route::post('/reports', [ReportController::class, 'store'])->name('reports.store');
    Route::get('/reports/{report}/edit', [ReportController::class, 'edit'])->name('reports.edit');
    Route::put('/reports/{report}', [ReportController::class, 'update'])->name('reports.update');
    Route::delete('/reports/{report}', [ReportController::class, 'destroy'])->name('reports.destroy');
});

// ОБЪЕДИНЯЕМ ВСЕ АДМИН-МАРШРУТЫ В ОДНУ ГРУППУ
Route::middleware([Admin::class])->group(function(){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::patch('/reports/status/{report}', [ReportController::class, 'statusUpdate'])
        ->name('reports.status.update');
});

require __DIR__.'/auth.php';