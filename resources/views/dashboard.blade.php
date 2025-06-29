{{-- resources/views/dashboard.blade.php --}}
<x-app-layout>
    {{-- Cabeçalho com cor branca no modo escuro --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Painel Administrativo') }}
        </h2>
    </x-slot>

    {{-- Conteúdo principal com fundo escuro --}}
    <div class="py-12 bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-300">
                    {{-- Saudação personalizada --}}
                    Bem-vindo, {{ Auth::user()->name }}!<br><br>

                    {{-- Links úteis para gerenciar projetos --}}
                    ✅ Para <strong>cadastrar um novo projeto</strong>:<br>
                    <a href="{{ route('projects.create') }}" class="text-blue-400 hover:text-blue-500 underline">
                        Criar Novo Projeto
                    </a><br><br>

                    ✅ Para <strong>ver todos os projetos cadastrados</strong>:<br>
                    <a href="{{ route('projects.index') }}" class="text-blue-400 hover:text-blue-500 underline">
                        Listar Projetos
                    </a><br><br>

                    ✅ Para <strong>voltar à página pública do portfólio</strong>:<br>
                    <a href="{{ url('/') }}" class="text-blue-400 hover:text-blue-500 underline">
                        Ver Portfólio
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
