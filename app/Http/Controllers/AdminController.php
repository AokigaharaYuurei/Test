<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Status;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        // Можно добавить middleware в конструкторе для дополнительной защиты
        $this->middleware(['auth', 'admin']);
    }
    
    public function index()
    {
        $reports = Report::with(['user', 'status'])->get();
        $allowedStatuses = Status::whereIn('name', ['подтверждено', 'отклонено'])->get();

        return view('admin.index', compact('reports', 'allowedStatuses'));
    }
}