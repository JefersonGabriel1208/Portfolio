@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto mt-10 bg-gray-900 text-white rounded shadow p-6">

        {{-- Título --}}
        <h1 class="text-3xl font-bold mb-4">{{ $project->title }}</h1>

        {{-- Imagem grande --}}
        @if ($project->image)
            <img src="{{ asset('storage/' . $project->image) }}"
                 class="w-full max-h-96 object-cover rounded mb-6">
        @endif

        {{-- Descrição completa --}}
        <p class="text-gray-300 mb-6">{{ $project->description }}</p>

        {{-- Link externo, se houver --}}
        @if ($project->url)
            <a href="{{ $project->url }}" target="_blank"
                class="inline-block bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 mb-4">
                Acessar Projeto
            </a>
        @endif

        {{-- Link para o repositório GitHub --}}
        @if ($project->github_url)
            <a href="{{ $project->github_url }}" target="_blank"
                class="inline-block text-blue-400 hover:text-blue-500 mt-2">
                📂 Ver Repositório no GitHub
            </a>
        @endif

        {{-- Botão voltar --}}
        <div class="mt-4">
            <a href="{{ url('/') }}" class="text-blue-400 hover:text-blue-500 text-sm">
                &larr; Voltar para o portfólio
            </a>
        </div>

    </div>
@endsection
