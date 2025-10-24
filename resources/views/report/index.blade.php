<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Страница заявлений</title>
</head>
<body>
    <header>
        <a href="{{ route('reports.index') }}"><h1 class="red"><span class="blue">НАРУШЕНИЙ</span>.НЕТ</h1></a>
        <nav>
            <a href="{{ route('reports.index') }}">Все заявления</a>
            <a href="{{ route('reports.create') }}">Создать заявление</a>
        </nav>
    </header>
    <main>
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
    </main>
</body>
</html>