{{-- resources/views/projects/edit.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 max-w-xl bg-gray-900 text-white rounded shadow">

        {{-- Título da página --}}
        <h1 class="text-2xl font-bold mb-4">Editar Projeto</h1>

        {{-- Exibe mensagens de erro de validação, se existirem --}}
        @if ($errors->any())
            <div class="bg-red-500 border border-red-700 text-white p-2 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Formulário de edição --}}
        <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data"
              class="space-y-4">
            @csrf
            @method('PUT') {{-- Spoof do método PUT --}}

            {{-- Título preenchido --}}
            <div>
                <label class="block mb-1 font-semibold">Título:</label>
                <input type="text" name="title" value="{{ $project->title }}"
                       class="w-full border rounded p-2 bg-gray-800 text-white" required>
            </div>

            {{-- Descrição preenchida --}}
            <div>
                <label class="block mb-1 font-semibold">Descrição:</label>
                <textarea name="description"
                          class="w-full border rounded p-2 bg-gray-800 text-white"
                          rows="5" required>{{ $project->description }}</textarea>
            </div>

            {{-- Upload de nova imagem (opcional) com botão estilizado --}}
            <div>
                <label class="block mb-1 font-semibold">Nova imagem (opcional):</label>
                <input type="file" name="image"
                       class="block w-full text-sm text-gray-300 file:mr-4 file:py-2 file:px-4
                              file:rounded file:border-0
                              file:text-sm file:font-semibold
                              file:bg-blue-700 file:text-white
                              hover:file:bg-blue-800
                              bg-gray-800 rounded p-2">
            </div>

            {{-- Campo URL do projeto preenchido --}}
            <div>
                <label class="block mb-1 font-semibold">Link do Projeto (opcional):</label>
                <input type="url" name="url" value="{{ old('url', $project->url) }}"
                       class="w-full border rounded p-2 bg-gray-800 text-white" placeholder="https://...">
            </div>

            {{-- Link do repositório GitHub preenchido --}}
            <div>
                <label class="block mb-1 font-semibold">Link do Repositório (GitHub):</label>
                <input type="url" name="github_url" value="{{ old('github_url', $project->github_url) }}"
                       class="w-full border rounded p-2 bg-gray-800 text-white" placeholder="https://github.com/seuprojeto">
            </div>

            {{-- Botão de envio --}}
            <div>
                <button type="submit" class="bg-blue-700 hover:bg-blue-800 text-white px-4 py-2 rounded">
                    Atualizar Projeto
                </button>
            </div>
        </form>

    </div>
@endsection
