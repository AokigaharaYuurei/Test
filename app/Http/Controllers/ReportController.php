<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Status;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->input('sort');
        if ($sort != 'asc' && $sort != 'desc') {
            $sort = 'desc';
        }

        $status = $request->input('status');
        $validate = $request->validate([
            'status' => "exists:statuses,id"
        ]);
        
        if ($validate) {
            $reports = Report::where('status_id', $status)
                ->where('user_id', Auth::user()->id)
                ->orderBy('created_at', $sort)
                ->paginate(8);
        } else {
            $reports = Report::where('user_id', Auth::user()->id)
                ->orderBy('created_at', $sort)
                ->paginate(8);
        }

        $statuses = Status::all();

        return view('report.index', compact('reports', 'statuses', 'sort', 'status'));
    }

    public function destroy(Report $report)
    {
        if (Auth::user()->id != $report->user_id) {
            abort(403, 'У вас нет прав на удаление этой записи.');
        }

        $report->delete();
        return redirect()->back()->with('info', 'Заявление удалено');
    }

    public function store(Request $request): RedirectResponse
    {
        // Валидация данных
        $validated = $request->validate([
            'number' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);
        
        // Создание заявления
        Report::create([
            'number' => $validated['number'],
            'description' => $validated['description'],
            'status_id' => 1,
            'user_id' => Auth::user()->id,
        ]);
        
        // Редирект на страницу со списком заявлений
        return redirect()->route('reports.index')->with('info', 'Заявление отправлено');
    }

    public function create(Report $report)
    {
        return view('report.create');
    }

    public function edit(Report $report)
    {
        if (Auth::user()->id === $report->user_id) {
            return view('report.edit', compact('report'));
        } else {
            abort(403, 'У вас нет прав на редактирование этой записи.');
        }
    }

    public function show(Report $report)
    {
        if (Auth::user()->id != $report->user_id) {
            abort(403, 'У вас нет прав на просмотр этой записи.');
        }

        return view('reports.show', compact('report'));
    }

    public function update(Request $request, Report $report)
    {
        if (Auth::user()->id != $report->user_id) {
            abort(403, 'У вас нет прав на обновление этой записи.');
        }

        $data = $request->validate([
            'number' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);

        $report->update($data);
        return redirect()->route('reports.index')->with('info', 'Заявление обновлено');
    }

    public function statusUpdate(Request $request, Report $report)
    {
        $report->update(['status_id' => $request->status_id]);
        return back()->with('success', 'Статус обновлен');
    }
}