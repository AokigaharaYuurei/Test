<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Административная панель</title>
</head>
<body>
    <x-app-layout>
        <h1>Административная панель</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <main>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ФИО</th>
                        <th>Текст заявления</th>
                        <th>Номер автомобиля</th>
                        <th>Статус</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reports as $report)
                    <tr>
                        <td>{{ $report->user->name ?? 'Не указано' }}</td>
                        <td>{{ $report->description }}</td>
                        <td>{{ $report->number }}</td>
                        <td>
                            @if($report->status->name === 'новое')
                                <form class="status-form" action="{{route('reports.status.update', $report->id)}}" method="POST">
                                    @method('patch')
                                    @csrf
                                    <select name="status_id" id="status_id">
                                        @foreach($allowedStatuses as $status)
                                        <option value="{{$status->id}}" {{$status->id === $report->status_id ? 'selected' : ''}}>
                                            {{$status->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                    <button type="submit">Обновить</button>
                                </form>
                            @else
                                {{ $report->status->name }}
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </main>
    </x-app-layout>
</body>
</html>