{{-- resources/views/auth/login.blade.php --}}
<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="bg-gray-900 text-white p-6 rounded shadow max-w-md mx-auto">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-white" />
            <x-text-input id="email"
                          class="block mt-1 w-full bg-gray-800 text-white border-gray-600 focus:border-blue-500 focus:ring focus:ring-blue-500"
                          type="email"
                          name="email"
                          :value="old('email')"
                          required
                          autofocus
                          autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="text-white" />
            <x-text-input id="password"
                          class="block mt-1 w-full bg-gray-800 text-white border-gray-600 focus:border-blue-500 focus:ring focus:ring-blue-500"
                          type="password"
                          name="password"
                          required
                          autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me"
                       type="checkbox"
                       class="rounded border-gray-600 bg-gray-800 text-blue-500 shadow-sm focus:ring-blue-500"
                       name="remember">
                <span class="ms-2 text-sm text-gray-300">{{ __('Lembrar de mim') }}</span>
            </label>
        </div>

        <!-- Links e botão -->
        <div class="flex items-center justify-between mt-6">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-blue-400 hover:text-blue-500"
                   href="{{ route('password.request') }}">
                    {{ __('Esqueceu sua senha?') }}
                </a>
            @endif

            @if (Route::has('register'))
            <x-primary-button>
            <a href="{{ route('register') }}">Registrar</a>
            </x-primary-button>
            @endif



            <x-primary-button class="ms-3 bg-blue-600 hover:bg-blue-700 text-white">
                {{ __('Entrar') }}
            </x-primary-button>


        </div>
    </form>
</x-guest-layout>
