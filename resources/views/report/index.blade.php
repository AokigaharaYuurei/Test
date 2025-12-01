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
        <div class="mb-6">
            <a href="{{ route('reports.create') }}" class="bg-[#FF0000] text-[18px] hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition duration-200 inline-block">
                Создать заявление
            </a>
        </div>
        <div class="bg-[#ffffff] rounded-xl mb-3 space-y-5 p-7 ">
         <div>
             <span class="">Сортировака по дате создания:</span>
                <a class="ml-3 text-[#8A8080] hover:text-[#000000]" href="{{ route('reports.index', ['sort' => 'desc', 'status' => $status]) }}">сначала новые</a>
                <a class="ml-5 text-[#8A8080] hover:text-[#000000]" href="{{ route('reports.index', ['sort' => 'asc', 'status' => $status]) }}">сначала старые</a>
            </div>
            <div class="bg-[#eeeeee] max-w h-1"></div>
         <div class="flex">
                 <p>Фильтрация по статусу заявки:</p>
                    <ul class="flex">
                        @foreach($statuses as $status)
                        <li class>
                        <a class="ml-3 text-[#8A8080] hover:text-[#000000]" href="{{route('reports.index', ['sort' => $sort, 'status' => $status->id])}}">
                            {{$status->name}} </a>
                        </li>
                        @endforeach
                    </ul>
            </div>
         </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-9 mt-8">
                @foreach ($reports as $report)
                <form method="POST" action="{{ route('reports.update', $report->id) }}">
                    @method('put')
                    @csrf
                    <div class="bg-[#ffff] mb-3 space-y-5 p-7 rounded-xl">
                        <p class="text-[#FF0000] font-bold text-[16px]">{{$report-> created_at}}</p>
                        <p class="text-blod font-bold text-[16px]">{{$report-> number}}</p>
                        <p class="text-[16px]">{{$report-> description}}</p>
                        <div class="flex">
                            <p class="text-[16px]"> Статус заявления -
                            <p class="font-bold ml-2 text-[16px]">{{$report->status->name}} </p>
                        </div>
                        <div class="flex justify-between p-5">
                            <a class="bg-[#ffffff] border-2 border-[#dadada] hover:text-[#747272] hover:border-[#747272] text-[#c5c5c5] font-semibold py-3 px-6 rounded-lg transition duration-200 inline-block" href="{{ route('reports.edit', $report->id) }}">Редактировать</a>
                            <form method="POST" action="{{ route('reports.destroy', $report->id) }}">
                                @method('DELETE')
                                @csrf
                                <input class="bg-[#ffffff] border-2 border-[#dadada] hover:text-[#747272] hover:border-[#747272] text-[#c5c5c5] font-semibold py-3 px-14 rounded-lg transition duration-200 inline-block cursor-pointer " type="submit" value="Удалить">
                            </form>
                        </div>
                    </div>
                </form>
                @endforeach
                {{$reports->links()}}
            </div>
        </div>
    </div>
    </x-app-layout>
</body>

</html>