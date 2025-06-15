@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto mt-10 bg-white rounded shadow p-6">

        {{-- Título --}}
        <h1 class="text-3xl font-bold mb-4">{{ $project->title }}</h1>

        {{-- Imagem grande --}}
        @if ($project->image)
            <img src="{{ asset('storage/' . $project->image) }}" class="w-full max-h-96 object-cover rounded mb-6">
        @endif

        {{-- Descrição completa --}}
        <p class="text-gray-800 mb-6">{{ $project->description }}</p>

        {{-- Link externo, se houver --}}
        @if ($project->url)
            <a href="{{ $project->url }}" target="_blank"
                class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mb-4">
                Acessar Projeto
            </a>
        @endif

        @if ($project->github_url)
            <a href="{{ $project->github_url }}" target="_blank"
                class="inline-block text-gray-700 underline hover:text-gray-900 mt-2">
                📂 Ver Repositório no GitHub
            </a>
        @endif


        {{-- Botão voltar --}}
        <div>
            <a href="{{ url('/') }}" class="text-gray-600 hover:underline text-sm">&larr; Voltar para o portfólio</a>
        </div>

    </div>
@endsection
