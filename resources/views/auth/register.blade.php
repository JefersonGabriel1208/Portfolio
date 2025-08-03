<x-guest-layout>
    <x-auth-card>

        

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Nome -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-200">Nome</label>
                <input id="name" name="name" type="text"
                    class="mt-1 block w-full bg-gray-800 border border-gray-700 text-white placeholder-gray-400 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 rounded-md shadow-sm"
                    value="{{ old('name') }}" required autofocus autocomplete="name" />
            </div>

            <!-- Email -->
            <div class="mt-4">
                <label for="email" class="block text-sm font-medium text-gray-200">Email</label>
                <input id="email" name="email" type="email"
                    class="mt-1 block w-full bg-gray-800 border border-gray-700 text-white placeholder-gray-400 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 rounded-md shadow-sm"
                    value="{{ old('email') }}" required autocomplete="username" />
            </div>

            <!-- Senha -->
            <div class="mt-4">
                <label for="password" class="block text-sm font-medium text-gray-200">Senha</label>
                <input id="password" name="password" type="password"
                    class="mt-1 block w-full bg-gray-800 border border-gray-700 text-white placeholder-gray-400 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 rounded-md shadow-sm"
                    required autocomplete="new-password" />
            </div>

            <!-- Confirmar Senha -->
            <div class="mt-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-200">Confirmar Senha</label>
                <input id="password_confirmation" name="password_confirmation" type="password"
                    class="mt-1 block w-full bg-gray-800 border border-gray-700 text-white placeholder-gray-400 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 rounded-md shadow-sm"
                    required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-400 hover:text-white" href="{{ route('login') }}">
                    Já tem conta?
                </a>

                <button type="submit"
                    class="ml-4 inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-offset-gray-800">
                    Registrar
                </button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
