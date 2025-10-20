<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование заявления</title>
</head>
<body>
    <header>
        <h1 class="red"><span class="blue">НАРУШЕНИЙ</span>.НЕТ</h1>
        <nav>
            <a href="{{ route('reports.index') }}">Все заявления</a>
            <a href="{{ route('reports.create') }}">Создать заявление</a>
        </nav>
    </header>
    <main>
        <div class="update">
            <div class="update_text">
                <form method="POST" action="{{ route('reports.update', $report->id) }}">
                    @csrf
                    @method('PUT')
                    <input type="text" id="number" name="number" value="{{ $report->number }}">
                    <textarea id="description" name="description">{{ $report->description }}</textarea>
                    <input type="submit" value="Обновить">
                </form>
            </div>
        </div>
    </main>
</body>
</html>