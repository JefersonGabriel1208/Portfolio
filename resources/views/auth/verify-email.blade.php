<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-300">
        Obrigado por se registrar! Antes de começar, verifique seu endereço de e-mail clicando no link que acabamos de enviar. Caso não tenha recebido, enviaremos outro.
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            Um novo link de verificação foi enviado para o e-mail fornecido durante o registro.
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <x-primary-button>
                Reenviar e-mail de verificação
            </x-primary-button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                Sair
            </button>
        </form>
    </div>
</x-guest-layout>
