<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="flex flex-col items-center justify-center mb-8">
            <header class="text-center w-full">
                <p class="text-[#051AFF] font-bold text-[48px]">НАРУШЕНИЙ <span class="text-[#FF0000] font-bold">.НЕТ</span></p>
                <p class="text-[32px] text-[#051AFF]">Авторизация</p>
            </header>
        </div>
        <!-- Email Address -->
        <div class="w-full flex justify-center mt-4">
            <x-text-input id="login" class=" w-[250px] block mt-1 w-full text-[#8A8080] text-[18px] border-[#051AFF]" type="text" name="login" :value="old('login')" required autofocus autocomplete="login" placeholder="логин"/>
            <x-input-error :messages="$errors->get('login')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4  w-full flex justify-center">

            <x-text-input id="password" class="w-[250px] block mt-1 w-full text-[#8A8080] text-[18px] border-[#051AFF]"
                            type="password"
                            name="password"
                            required autocomplete="current-password" placeholder="пароль"/>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Запомнить меня') }}</span>
            </label>
        </div>

        <div class="flex flex-col items-center mt-4 space-y-3">
            <x-primary-button class="w-[250px] bg-[#051AFF] justify-center">
                {{ __('Войти') }}
            </x-primary-button>

            @if (Route::has('password.request'))
                <a class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 transition-colors duration-200" href="{{ route('password.request') }}">
                    {{ __('Забыли пароль?') }}
                </a>
            @endif
        </div>
    </form>
</x-guest-layout>