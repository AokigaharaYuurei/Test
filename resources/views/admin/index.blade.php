<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Административная панель</title>
</head>
<body>
    <x-app-layout >
       <div class="min-h-screen bg-[#DDE8FF] py-8">
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
            <table class="bg-[#FFFFFF] m-6">
                <thead class="bg-[#051AFF] text-[#FFFFFF] text-[20px] w-[1180px]">
                    <tr>
                        <th>Дата</th>
                        <th>ФИО подавшего</th>
                        <th>Номер автомобиля</th>
                        <th>Описание заявления</th>
                        <th>Статус</th>
                    </tr>
                </thead>
                <tbody class="text-[20px]">
                    @foreach ($reports as $report)
                    <tr>
                        <td>{{ $report-> created_at}}</td>
                        <td>{{ $report->user->name ?? 'Не указано' }}</td>
                        <td>{{ $report->number }}</td>
                        <td>{{ $report->description }}</td>
                        <td>
                            @if($report->status->name === 'новое')
                                <form class="status-form" action="{{route('reports.status.update', $report->id)}}" method="POST">
                                    @method('patch')
                                    @csrf
                                    <select class="border-[#051AFF] rounded-lg text-[20px]" name="status_id" id="status_id">
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
       </div>
    </x-app-layout>
</body>
</html>