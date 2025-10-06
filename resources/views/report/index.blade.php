<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Страница заявлений</title>
    <style>

    </style>
</head>

<body>
    <header>
        <h1 class="red"><span class="blue">НАРУШЕНИЙ</span>.НЕТ</h1>
    </header>
    <main>
        <button>создать заявление</button>
        <div class="card">
            <p class="data">19.10.2024</p>
            <div class="text-line">
                @foreach ($reports as $report)
                <p>{{$report->number}}</p>
                <p>{{$report->description}}</p>
                @endforeach
                <form method="POST" action="{{route('reports.destroy', $report->id)}}">
                    @method('delete')
                    @csrf
                    <input type="submit" value="Удалить">
                </form>
            </div>
        </div>
    </main>
</body>

</html>