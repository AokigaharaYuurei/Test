<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <x-app-layout>
        <header><a href="{{ route('reports.index') }}">
                <h1 class="red"><span class="blue">НАРУШЕНИЙ</span>.НЕТ</h1>
            </a></header>
        <h1>Административная панель</h1>
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
                            <form class="status-form" action="{{route('reports.status.update', $report->id)}}" method="POST">
                                @method('patch')
                                @csrf
                                <select name="status_id" id="status_id">
                                    @foreach($statuses as $status)
                                    <option value="{{$status->id}}" {{$status->id === $report->status_id ? 'selected' : ''}}>
                                        {{$status->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </main>
    </x-app-layout>
</body>

</html>