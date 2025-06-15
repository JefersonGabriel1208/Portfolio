<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfólio - Jeferson Gabriel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-900">

    <!-- Cabeçalho -->
    <header class="bg-white shadow p-6 mb-6">
        <div class="max-w-6xl mx-auto flex flex-col md:flex-row justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold">Jeferson Gabriel</h1>
                <p class="text-gray-600">Desenvolvedor Web | PHP | Laravel</p>
            </div>
            <div class="flex space-x-4 mt-4 md:mt-0">
                <a href="https://github.com/JefersonGabriel1208?tab=repositories" target="_blank"
                    class="text-blue-600 hover:underline">GitHub</a>
                <a href="#" onclick="alert('Email: jefersongabrielsx@gmail.com ')"
                    class="text-blue-600 hover:underline">
                    Contato
                </a>

                <a href="https://www.linkedin.com/in/jeferson-gabriel-b919ab1b7/" target="_blank"
                    class="text-blue-600 hover:underline">LinkedIn</a>
            </div>
        </div>
    </header>

    <!-- Lista de projetos -->
    <main class="max-w-6xl mx-auto px-4">
        <h2 class="text-2xl font-semibold mb-6">Projetos Recentes</h2>

        @if ($projects->count() > 0)
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($projects as $project)
                    <div class="bg-white rounded shadow p-4 flex flex-col">
                        <!-- Imagem -->
                        @if ($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" alt="Imagem do projeto"
                                class="rounded mb-3 w-full h-40 object-cover">
                        @endif

                        <!-- Título -->
                        <h3 class="text-xl font-bold mb-1">{{ $project->title }}</h3>

                        <!-- Descrição -->
                        <p class="text-gray-700 mb-2">{{ Str::limit($project->description, 100) }}</p>

                        <!-- Link externo -->
                        @if (!empty($project->url))
                            <a href="{{ $project->url }}" target="_blank"
                                class="inline-block bg-blue-500 text-white px-3 py-1 rounded text-sm hover:bg-blue-600 transition mt-2">
                                Acessar Projeto
                            </a>
                        @endif

                        @if ($project->github_url)
                            <a href="{{ $project->github_url }}" target="_blank"
                                class="inline-block text-sm text-gray-700 hover:text-gray-900 mt-1">
                                📂 Ver Repositório
                            </a>
                        @endif



                        <!-- Ver detalhes -->
                        <a href="{{ route('projects.show', $project->id) }}"
                            class="text-sm text-gray-500 hover:underline mt-2">
                            Ver detalhes
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-600">Nenhum projeto cadastrado ainda.</p>
        @endif
    </main>

    <!-- Rodapé -->
    <footer class="mt-10 p-6 text-center text-sm text-gray-500">
        &copy; {{ date('Y') }} Jeferson Gabriel. Todos os direitos reservados.
        <br>
        <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Área Administrativa</a>
    </footer>

</body>

</html>
