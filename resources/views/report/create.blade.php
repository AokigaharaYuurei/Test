<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создание заявления</title>
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
        <form method="POST" action="{{ route('reports.store') }}">
            @csrf
            <input type="text" name="number" placeholder="регистрационный номер авто" required>
            <textarea name="description" placeholder="описание нарушения" required></textarea>
            <input type="submit" value="Создать">
        </form>
    </main>
</body>
</html>