<?php

use App\Http\Controllers\ReportController;
use App\Models\Report;
use Illuminate\Support\Facades\Route;
use Phiki\Phast\Root;

Route::get('/', function () {return view('welcome');});

Route::get('/reports', [ReportController::class, 'index'])->name('report.index');

Route::get('/reports/create', function (){return view('report.create');})->name('reports.create');

Route::delete('/reports/{report}',[ReportController::class, 'destroy'])->name('reports.destroy');

Route::post('/reports', [ReportController::class, 'store'])->name('reports.store');

Route::get('/create', [ReportController::class, 'create'])->name('reports.create');

Route::get('reports/{report}/edit', [ReportController::class, 'edit'])->name('reports.edit');

Route::put('/reports/{report}', [ReportController::class, 'update'])->name('reports.update');