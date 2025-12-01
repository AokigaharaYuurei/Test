<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создание заявления</title>
</head>

<body>

    <main>
        <x-app-layout>
            <header class="min-h-screen bg-[#DDE8FF] py-8">
                <form method="POST" action="{{ route('reports.store') }}" class="w-[400px]">
                    @csrf
                    <input class="text-[#8A8080] border-[#051AFF] rounded-lg w-[319px] h-[38px]  m-4" type="text" name="number" placeholder="регистрационный номер авто" required>
                    <textarea class="text-[#8A8080] border-[#051AFF] rounded-lg w-[653px] h-[166px] m-4" name="description" placeholder="описание нарушения" required></textarea>
                    <input class="bg-[#FF0000] hover:bg-blue-700  text-white font-semibold m-4 py-3 px-6 rounded-lg shadow-md transition duration-200 inline-block" type="submit" value="Создать заявление">
                </form>
            </header>
        </x-app-layout>
    </main>

</body>

</html>