<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Painel Administrativo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Bem-vindo, {{ Auth::user()->name }}!<br><br>

                    ✅ Para <strong>cadastrar um novo projeto</strong>:
                    <a href="{{ route('projects.create') }}" class="text-blue-600 hover:underline">Criar Novo Projeto</a><br><br>

                    ✅ Para <strong>ver todos os projetos cadastrados</strong>:
                    <a href="{{ route('projects.index') }}" class="text-blue-600 hover:underline">Listar Projetos</a><br><br>

                    ✅ Para <strong>voltar à página pública do portfólio</strong>:
                    <a href="{{ url('/') }}" class="text-blue-600 hover:underline">Ver Portfólio</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

