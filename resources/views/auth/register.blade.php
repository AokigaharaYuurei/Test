<x-guest-layout>
    <header></header>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="flex flex-col items-center justify-center mb-8">
            <header class="text-center w-full">
                <p class="text-[#051AFF] font-bold text-[48px]">НАРУШЕНИЙ <span class="text-[#FF0000] font-bold">.НЕТ</span></p>
                <p class="text-[32px] text-[#051AFF]">Регистрация</p>
            </header>
        </div>

        <!--Login-->
        <div class="w-full flex justify-center mt-4">
            <x-text-input id="login" class="block mt-1 w-[250px] text-[#8A8080] border-[#051AFF]" type="text" name="login" :value="old('login')" required autocomplete="login" placeholder="Логин" />
            <x-input-error :messages="$errors->get('login')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="w-full flex justify-center mt-4">

            <x-text-input id="password" class="block mt-1 w-[250px] text-[#8A8080] border-[#051AFF]"
                type="password"
                name="password"
                required autocomplete="new-password" placeholder="Пароль" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="w-full flex justify-center mt-4">

            <x-text-input id="password_confirmation" class="block mt-1 w-[250px] text-[#8A8080] border-[#051AFF]"
                type="password"
                name="password_confirmation" required autocomplete="new-password" placeholder="Подтвердите пароль" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!--Lastname-->
        <div class="w-full flex justify-center mt-4">
            <x-text-input id="lastname" class="block mt-1 w-[250px] text-[#8A8080] border-[#051AFF]" type="text" name="lastname" :value="old('lastname')" required autocomplete="lastname" placeholder="Фамилия" />
            <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
        </div>

        <!-- Name -->
        <div class="w-full flex justify-center mt-4">
            <x-text-input id="name" class="block mt-1 w-[250px] text-[#8A8080] border-[#051AFF]" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Имя" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!--Middlename-->
        <div class="w-full flex justify-center mt-4">
            <x-text-input id="middlename" class="block mt-1 w-[250px] text-[#8A8080] border-[#051AFF]" type="text" name="middlename" :value="old('middlename')" required autocomplete="middlename" placeholder="Отчество" />
            <x-input-error :messages="$errors->get('middlename')" class="mt-2" />
        </div>

        <!--Tel-->
        <div class="w-full flex justify-center mt-4">
            <x-tel-input id="tel" class="block mt-1 w-[250px] text-[#8A8080] border-[#051AFF]" type="tel" name="tel" :value="old('tel')" required autocomplete="tel" placeholder="Телефон" />
            <x-input-error :messages="$errors->get('tel')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="w-full flex justify-center mt-4">
            <x-text-input id="email" class="block mt-1 w-[250px] text-[#8A8080] border-[#051AFF]" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Почта" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex flex-col items-center w-full flex justify-center space-y-3 mt-4">

            <x-primary-button class="ms-4 w-[250px] bg-[#051AFF] justify-center">
                {{ __('создать аккаунт') }}
            </x-primary-button>

            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('У вас уже есть аккаунт? ') }}<span class="text-[#051AFF]">Войти</span>
            </a>


        </div>
    </form>
</x-guest-layout>