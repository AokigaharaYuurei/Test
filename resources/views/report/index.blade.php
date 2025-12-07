<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Страница заявлений</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/style.css'])
</head>

<body>
    <x-app-layout>
<div class="min-h-screen bg-[#DDE8FF] py-8">
    <div class="container mx-auto px-4">
        <!-- Контейнер для кнопок -->
        <div class="mb-6 flex flex-col sm:flex-row gap-4">
            <a href="{{ route('reports.create') }}" class="bg-[#FF0000] text-[18px] hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition duration-200 inline-block text-center w-full sm:w-auto">
                Создать заявление
            </a>
            
            <!-- Кнопка для администратора -->
            @auth
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.index') }}" class="bg-[#051AFF] text-[18px] hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition duration-200 inline-block text-center w-full sm:w-auto">
                        Перейти в панель администратора
                    </a>
                @endif
            @endauth
        </div>
        
        <!-- Блок фильтров -->
        <div class="bg-[#ffffff] rounded-xl mb-3 space-y-4 p-4 md:p-7">
            <!-- Сортировка -->
            <div class="flex flex-col sm:flex-row sm:items-center">
                <span class="text-[14px] md:text-[16px] mb-2 sm:mb-0">Сортировка по дате создания:</span>
                <div class="flex space-x-2 sm:space-x-5">
                    <a class="text-[#8A8080] hover:text-[#000000] text-[14px] md:text-[16px]" href="{{ route('reports.index', ['sort' => 'desc', 'status' => $status]) }}">
                        сначала новые
                    </a>
                    <a class="text-[#8A8080] hover:text-[#000000] text-[14px] md:text-[16px]" href="{{ route('reports.index', ['sort' => 'asc', 'status' => $status]) }}">
                        сначала старые
                    </a>
                </div>
            </div>
            
            <div class="bg-[#eeeeee] h-1"></div>
            
            <!-- Фильтрация по статусу -->
            <div class="flex flex-col sm:flex-row sm:items-center">
                <p class="text-[14px] md:text-[16px] mb-2 sm:mb-0">Фильтрация по статусу заявки:</p>
                <ul class="flex flex-wrap gap-2 sm:gap-0 sm:flex-nowrap">
                    @foreach($statuses as $statusItem)
                    <li>
                        <a class="ml-0 sm:ml-3 text-[#8A8080] hover:text-[#000000] text-[14px] md:text-[16px]" href="{{route('reports.index', ['sort' => $sort, 'status' => $statusItem->id])}}">
                            {{$statusItem->name}}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Список заявлений -->
        <div class="grid grid-cols-1 gap-4 md:gap-9 mt-6 md:mt-8">
            @foreach ($reports as $report)
            <form method="POST" action="{{ route('reports.update', $report->id) }}">
                @method('put')
                @csrf
                <div class="bg-[#ffff] mb-3 space-y-4 p-4 md:p-7 rounded-xl">
                    <p class="text-[#FF0000] font-bold text-[14px] md:text-[16px]">{{\Carbon\Carbon::parse($report->created_at)->translatedFormat('j F Y h:i');}}</p>
                    <p class="text-blod font-bold text-[14px] md:text-[16px]">{{$report-> number}}</p>
                    <p class="text-[14px] md:text-[16px] leading-relaxed">{{$report-> description}}</p>
                    
                    <div class="flex flex-wrap items-center">
                        <p class="text-[14px] md:text-[16px]">Статус заявления -</p>
                        <p class="font-bold ml-2 text-[14px] md:text-[16px]">{{$report->status->name}}</p>
                    </div>
                    <div class="flex flex-col sm:flex-row justify-between gap-3 p-3 md:p-5">
                        <a class="bg-[#ffffff] border-2 border-[#dadada] hover:text-[#747272] hover:border-[#747272] text-[#c5c5c5] font-semibold py-2 px-4 md:py-3 md:px-6 rounded-lg transition duration-200 text-center text-[14px] md:text-[16px]" href="{{ route('reports.edit', $report->id) }}">
                            Редактировать
                        </a>
                        <form method="POST" action="{{ route('reports.destroy', $report->id) }}" class="w-full sm:w-auto">
                            @method('DELETE')
                            @csrf
                            <input class="bg-[#ffffff] border-2 border-[#dadada] hover:text-[#747272] hover:border-[#747272] text-[#c5c5c5] font-semibold py-2 px-4 md:py-3 md:px-14 rounded-lg transition duration-200 w-full text-center text-[14px] md:text-[16px] cursor-pointer" type="submit" value="Удалить">
                        </form>
                    </div>
                </div>
            </form>
            @endforeach
            
            <!-- Пагинация -->
            <div class="mt-4 md:mt-6">
                {{$reports->links()}}
            </div>
        </div>
    </div>
</div>
</x-app-layout>
</body>

</html>