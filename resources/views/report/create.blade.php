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
            @include('components.flash-messages')
            <header class="min-h-screen bg-[#DDE8FF] py-8 [@media(max-width:320px)]:py-4">
                <div class="flex">
                    <form method="POST" action="{{ route('reports.store') }}" class="w-[400px] [@media(max-width:320px)]:w-full [@media(max-width:320px)]:px-4">
                        @csrf
                        
                        <div class="[@media(max-width:320px)]:mb-4">
                            <input class="text-[#8A8080] border-[#051AFF] rounded-lg w-[319px] h-[38px] m-4 [@media(max-width:320px)]:w-full [@media(max-width:320px)]:m-0 [@media(max-width:320px)]:h-[40px] [@media(max-width:320px)]:text-[14px] [@media(max-width:320px)]:px-3" 
                                   type="text" 
                                   name="number" 
                                   placeholder="Регистрационный номер авто" 
                                   required>
                        </div>
                        
                        <div class="[@media(max-width:320px)]:mb-6">
                            <textarea class="text-[#8A8080] border-[#051AFF] rounded-lg w-[653px] h-[166px] m-4 [@media(max-width:320px)]:w-full [@media(max-width:320px)]:h-[140px] [@media(max-width:320px)]:m-0 [@media(max-width:320px)]:text-[14px] [@media(max-width:320px)]:px-3 [@media(max-width:320px)]:py-2" 
                                      name="description" 
                                      placeholder="Описание нарушения" 
                                      required></textarea>
                        </div>
                        
                        <div class="[@media(max-width:320px)]:text-center">
                            <input class="bg-[#FF0000] hover:bg-blue-700 text-white font-semibold m-4 py-3 px-6 rounded-lg shadow-md transition duration-200 inline-block [@media(max-width:320px)]:w-full [@media(max-width:320px)]:m-0 [@media(max-width:320px)]:py-3 [@media(max-width:320px)]:text-[16px]" 
                                   type="submit" 
                                   value="Создать заявление">
                        </div>
                    </form>
                </div>
            </header>
        </x-app-layout>
    </main>
</body>

</html>