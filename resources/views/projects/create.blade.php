{{-- resources/views/projects/create.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 max-w-xl">

        {{-- Título da página --}}
        <h1 class="text-2xl font-bold mb-4">Cadastrar Novo Projeto</h1>

        {{-- Exibe mensagens de erro de validação, se existirem --}}
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 p-2 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Formulário de criação --}}
        <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf {{-- Proteção contra CSRF --}}

            {{-- Título do projeto --}}
            <div>
                <label class="block mb-1 font-semibold">Título:</label>
                <input type="text" name="title" class="w-full border rounded p-2" required>
            </div>

            {{-- Descrição do projeto --}}
            <div>
                <label class="block mb-1 font-semibold">Descrição:</label>
                <textarea name="description" class="w-full border rounded p-2" rows="5" required></textarea>
            </div>

            {{-- Upload de imagem --}}
            <div>
                <label class="block mb-1 font-semibold">Imagem (opcional):</label>
                <input type="file" name="image" class="w-full">
            </div>

            {{-- Campo URL do projeto --}}
            <div>
                <label class="block mb-1 font-semibold">Link do Projeto (opcional):</label>
                <input type="url" name="url" class="w-full border rounded p-2" placeholder="https://...">
            </div>

            {{-- Link do repositório GitHub --}}
            <div class="mt-4">
                <label class="block mb-1 font-semibold">Link do Repositório (GitHub):</label>
                <input type="url" name="github_url" class="w-full border rounded p-2"
                    placeholder="https://github.com/seuprojeto">
            </div>



            {{-- Botão de envio --}}
            <div>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">
                    Salvar Projeto
                </button>
            </div>
        </form>

    </div>
@endsection
