<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Страница заявлений</title>
</head>
<body>
    
    <main>
        <x-app-layout>
            <header>
        <a href="{{ route('reports.index') }}"><h1 class="red"><span class="blue">НАРУШЕНИЙ</span>.НЕТ</h1></a>
        <nav>
            <a href="{{ route('reports.index') }}">Все заявления</a>
            <a href="{{ route('reports.create') }}">Создать заявление</a>
        </nav>
    </header>
            <div>
                <span>Сортировка по дате создания: </span>
                <a href="{{ route('reports.index', ['sort' => 'desc', 'status' => $status]) }}">сначала новые</a>
                <a href="{{ route('reports.index', ['sort' => 'asc', 'status' => $status]) }}">сначала старые</a>
            </div>
            <div>
                <p>Фильтрация по статусу заявки</p>
                <ul>
                    @foreach ($statuses as $status)
                    <li>
                        <a href="{{route('reports.index', ['sort' => $sort,  'status' => $status->id])}}">
                            {{$status->name}}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        <div class="card">
            <p class="data">19.10.2024</p>
            <div class="text-line">
                @foreach ($reports as $report)
                <p>{{$report->number}}</p>
                <p>{{$report->description}}</p>
                <p>{{$report->status->name}}</p>
                
                <a href="{{ route('reports.edit', $report->id) }}">Редактировать</a>
                
                <form method="POST" action="{{ route('reports.destroy', $report->id) }}">
                    @method('DELETE')
                    @csrf
                    <input type="submit" value="Удалить">
                </form>
                <hr>
                @endforeach
                {{$reports->links()}}
            </div>
            
        </div>
        </x-app-layout>
    </main>
</body>
</html>