<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfólio - Jeferson Gabriel</title>

    {{-- Importa o Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 text-white">

    {{-- Cabeçalho com fundo escuro e texto claro --}}
    <header class="bg-gray-800 shadow p-6 mb-6">
        <div class="max-w-6xl mx-auto flex flex-col md:flex-row justify-between items-center">

            {{-- Nome e descrição --}}
            <div>
                <h1 class="text-3xl font-bold">Jeferson Gabriel</h1>
                <p class="text-gray-400">Desenvolvedor Web | PHP | Laravel</p>
            </div>

            {{-- Links sociais --}}
            <div class="flex space-x-4 mt-4 md:mt-0">
                <a href="https://github.com/JefersonGabriel1208" target="_blank"
                    class="text-blue-400 hover:text-blue-500">GitHub</a>

                {{-- Contato com Alert --}}
                <a href="#" onclick="alert('Meu e-mail: jefersongabrielsx@gmail.com')"
                    class="text-blue-400 hover:text-blue-500">Contato</a>

                <a href="https://www.linkedin.com/in/jeferson-gabriel-b919ab1b7/" target="_blank"
                    class="text-blue-400 hover:text-blue-500">LinkedIn</a>
            </div>
        </div>
    </header>

    {{-- Seção principal: Lista de Projetos --}}
    <main class="max-w-6xl mx-auto px-4">
        <h2 class="text-2xl font-semibold mb-6">Projetos Recentes</h2>

        @if ($projects->count() > 0)
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

                {{-- Loop de projetos --}}
                @foreach ($projects as $project)
                    <div class="bg-gray-800 rounded shadow p-4 flex flex-col">

                        {{-- Imagem do projeto --}}
                        @if ($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" alt="Imagem do projeto"
                                class="rounded mb-3 w-full h-40 object-cover">
                        @endif

                        {{-- Título --}}
                        <h3 class="text-xl font-bold mb-1">{{ $project->title }}</h3>

                        {{-- Descrição resumida --}}
                        <p class="text-gray-300 mb-2">{{ Str::limit($project->description, 100) }}</p>

                        {{-- Link para acessar o projeto externo --}}
                        @if (!empty($project->url))
                            <a href="{{ $project->url }}" target="_blank"
                                class="inline-block bg-blue-700 text-white px-3 py-1 rounded text-sm hover:bg-blue-800 transition mt-auto">
                                Acessar Projeto
                            </a>
                        @endif

                        {{-- Link para o repositório --}}
                        @if (!empty($project->github_url))
                            <a href="{{ $project->github_url }}" target="_blank"
                                class="inline-block bg-gray-700 text-white px-3 py-1 rounded text-sm hover:bg-gray-600 transition mt-2">
                                Ver Repositório
                            </a>
                        @endif

                        {{-- Link para detalhes --}}
                        <a href="{{ route('projects.show', $project->id) }}"
                            class="mt-2 inline-block text-blue-400 hover:text-blue-500 text-sm">
                            Ver detalhes
                        </a>
                    </div>
                @endforeach

            </div>
        @else
            <p class="text-gray-400">Nenhum projeto cadastrado ainda.</p>
        @endif
    </main>

    {{-- Rodapé com link para área administrativa --}}
    <footer class="mt-10 p-6 text-center text-sm text-gray-500">
        &copy; {{ date('Y') }} Jeferson Gabriel. Todos os direitos reservados.
        <br>
        <a href="{{ route('login') }}" class="text-blue-400 hover:text-blue-500">Área Administrativa</a>
    </footer>

</body>

</html>
