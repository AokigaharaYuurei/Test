<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use Phiki\Phast\Root;

Route::get('/', function () {return view('welcome');});

Route::get('/reports', [ReportController::class, 'index'])->name('report.index');

Route::get('/reports/create', function (){return view('report.create');})->name('reports.create');

Route::delete('/reports/{report}',[ReportController::class, 'destroy'])->name('reports.destroy');
