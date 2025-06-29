@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 bg-gray-900 text-white min-h-screen">

        {{-- Título da página --}}
        <h1 class="text-2xl font-bold mb-4">Meus Projetos</h1>

        {{-- Botão para criar novo projeto --}}
        <a href="{{ route('projects.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
            Criar novo projeto
        </a>


        {{-- Verifica se há projetos cadastrados --}}
        @if ($projects->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach ($projects as $project)
                    <div class="bg-gray-800 rounded shadow p-4">

                        {{-- Exibe imagem do projeto, se existir --}}
                        @if ($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" alt="Imagem do projeto"
                                class="w-32 h-32 object-cover rounded mb-2">
                        @endif

                        {{-- Título do projeto --}}
                        <h2 class="text-xl font-semibold">{{ $project->title }}</h2>

                        {{-- Descrição curta --}}
                        <p class="text-gray-300">{{ Str::limit($project->description, 100) }}</p>

                        {{-- Ações: Editar e Deletar --}}
                        <div class="mt-2 flex gap-2">
                            <a href="{{ route('projects.edit', $project) }}"
                                class="text-blue-400 hover:text-blue-500">Editar</a>

                            <form action="{{ route('projects.destroy', $project) }}" method="POST"
                                onsubmit="return confirm('Tem certeza que deseja deletar?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-400 hover:text-red-600">Deletar</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-400">Você ainda não cadastrou nenhum projeto.</p>
        @endif
    </div>
@endsection
