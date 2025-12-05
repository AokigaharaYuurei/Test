<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Административная панель</title>
</head>

<body>
    <x-app-layout>
        <div class="min-h-screen bg-[#DDE8FF] py-8 [@media(max-width:320px)]:py-4">
            <!-- Уведомления -->
            @if(session('success'))
            <div class="alert alert-success m-4 [@media(max-width:320px)]:m-3 [@media(max-width:320px)]:text-[14px]">
                {{ session('success') }}
            </div>
            @endif

            @if($errors->any())
            <div class="alert alert-danger m-4 [@media(max-width:320px)]:m-3 [@media(max-width:320px)]:text-[14px]">
                @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
                @endforeach
            </div>
            @endif

            <main>
                <!-- Контейнер для горизонтальной прокрутки на мобильных -->
                <div class="overflow-x-auto [@media(max-width:320px)]:mx-3">
                    <table class="bg-[#FFFFFF] m-6 [@media(max-width:320px)]:m-0 [@media(max-width:320px)]:w-full [@media(max-width:320px)]:min-w-[800px]">
                        <thead class="bg-[#051AFF] text-[#FFFFFF] text-[20px] w-[1180px] [@media(max-width:320px)]:w-full [@media(max-width:320px)]:text-[12px]">
                            <tr>
                                <th class="[@media(max-width:320px)]:p-2 [@media(max-width:320px)]:text-left">Дата</th>
                                <th class="[@media(max-width:320px)]:p-2 [@media(max-width:320px)]:text-left">ФИО подавшего</th>
                                <th class="[@media(max-width:320px)]:p-2 [@media(max-width:320px)]:text-left">Номер автомобиля</th>
                                <th class="[@media(max-width:320px)]:p-2 [@media(max-width:320px)]:text-left">Описание заявления</th>
                                <th class="[@media(max-width:320px)]:p-2 [@media(max-width:320px)]:text-left">Статус</th>
                            </tr>
                        </thead>
                        <tbody class="text-[20px] [@media(max-width:320px)]:text-[12px]">
                            @foreach ($reports as $report)
                            <tr class="[@media(max-width:320px)]:border-b [@media(max-width:320px)]:border-gray-200">
                                <td class="[@media(max-width:320px)]:p-2">{{ $report->created_at }}</td>
                                <td class="[@media(max-width:320px)]:p-2">{{ $report->user->name ?? 'Не указано' }}</td>
                                <td class="[@media(max-width:320px)]:p-2">{{ $report->number }}</td>
                                <td class="[@media(max-width:320px)]:p-2 [@media(max-width:320px)]:max-w-[120px] [@media(max-width:320px)]:truncate">{{ $report->description }}</td>
                                <td class="[@media(max-width:320px)]:p-2">
                                    @if($report->status->name === 'новое')
                                    <form class="status-form flex flex-col [@media(max-width:320px)]:gap-1" action="{{route('reports.status.update', $report->id)}}" method="POST">
                                        @method('patch')
                                        @csrf
                                        <select class="border-[#051AFF] rounded-lg text-[20px] [@media(max-width:320px)]:text-[12px] [@media(max-width:320px)]:p-1 [@media(max-width:320px)]:w-full" name="status_id" id="status_id">
                                            @foreach($allowedStatuses as $status)
                                            <option value="{{$status->id}}" {{$status->id === $report->status_id ? 'selected' : ''}}>
                                                {{$status->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                        <button class="bg-[#051AFF] hover:bg-blue-700 text-white rounded-lg px-2 py-1 [@media(max-width:320px)]:text-[12px] [@media(max-width:320px)]:px-1 [@media(max-width:320px)]:py-1 [@media(max-width:320px)]:mt-1" type="submit">Обновить</button>
                                    </form>
                                    @else
                                    <span class="[@media(max-width:320px)]:inline-block [@media(max-width:320px)]:w-full">{{ $report->status->name }}</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </x-app-layout>
</body>

</html>