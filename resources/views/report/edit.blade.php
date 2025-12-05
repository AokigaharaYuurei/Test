<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование заявления</title>
</head>

<body>
    <main>
        <x-app-layout>
            <header class="bg-[#DDE8FF] py-8 [@media(max-width:320px)]:py-4">
                <nav>
                    <a href="{{ route('reports.create') }}" class="bg-[#FF0000] text-[18px] hover:bg-blue-700 text-white font-semibold py-3 px-6 mx-4 rounded-lg shadow-md transition duration-200 inline-block [@media(max-width:320px)]:my-4 [@media(max-width:320px)]:text-center ">
                        Создать заявление
                    </a>
                </nav>
            </header>
            <div class="min-h-screen bg-[#DDE8FF] py-8 [@media(max-width:320px)]:py-4">
                <div class="update_text flex">
                    <form method="POST" action="{{ route('reports.update', $report->id) }}" class="w-[400px] [@media(max-width:320px)]:w-full [@media(max-width:320px)]:px-4">
                        @csrf
                        @method('PUT')
                        
                        <div class="[@media(max-width:320px)]:mb-4">
                            <input class="text-[#8A8080] border-[#051AFF] rounded-lg w-[319px] h-[38px] m-4 [@media(max-width:320px)]:w-full [@media(max-width:320px)]:m-0 [@media(max-width:320px)]:h-[40px]" 
                                   type="text" 
                                   id="number" 
                                   name="number" 
                                   value="{{ $report->number }}">
                        </div>
                        
                        <div class="[@media(max-width:320px)]:mb-6">
                            <textarea class="text-[#8A8080] border-[#051AFF] rounded-lg w-[653px] h-[166px] m-4 [@media(max-width:320px)]:w-full [@media(max-width:320px)]:h-[140px] [@media(max-width:320px)]:m-0" 
                                      id="description" 
                                      name="description">{{ $report->description }}</textarea>
                        </div>
                        
                        <div class="[@media(max-width:320px)]:text-center">
                            <input class="bg-[#FF0000] hover:bg-blue-700 text-white font-semibold m-4 py-3 px-6 rounded-lg shadow-md transition duration-200 inline-block [@media(max-width:320px)]:w-full [@media(max-width:320px)]:m-0 [@media(max-width:320px)]:py-3 [@media(max-width:320px)]:text-[16px]" 
                                   type="submit" 
                                   value="Обновить">
                        </div>
                    </form>
                </div>
            </div>
        </x-app-layout>
    </main>
</body>

</html>