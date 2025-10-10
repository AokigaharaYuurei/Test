<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Изменение данных отчёта</title>
</head>

<body>
    <header>
        <h1 class="red"><span class="blue">НАРУШЕНИЙ</span>.НЕТ</h1>
    </header>
    <main>
        <div class="update">
            <div class="update_text">
                <form method="POST" action="{{ route('reports.update', $report->id) }}">
                    @csrf
                    @method('put')
                    <input type="text" id="number" name="number" value="{{ $report->number }}">
                    <textarea id="description" name="description">{{ $report->description }}</textarea>
                    <input type="submit" value="Обновить">
                </form>
            </div>
        </div>
    </main>
</body>

</html>