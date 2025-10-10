<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(){
    $reports = Report::all();
    return view('report.index', compact('reports'));
}

public function destroy(Report $report){
    $report -> delete();
    return redirect()->back();
}

public function store(Request $request, Report $report){
    $data = $request -> validate([
        'number' => 'string',
        'description' => 'string',
    ]);

    $report->create($data);
    return redirect()->back();
}

 public function create(Report $report)
    {
        return view('report.create');
    }

public function edit(Report $report){
    return view('reports.edit', compact('report'));

    $data = $request -> validate([
        'number' => 'string',
        'description' => 'text',
    ]);

    $report->update($data);
    return redirect()->back();
}
}


