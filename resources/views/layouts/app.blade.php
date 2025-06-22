{{-- resources/views/layouts/app.blade.php --}}

@include('layouts.navigation')
@vite(['resources/css/app.css', 'resources/js/app.js'])

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Portfólio</title>

    {{-- Tailwind CSS via CDN (não precisa do Vite agora) --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>

{{-- Muda o fundo e texto padrão do body para escuro --}}
<body class="bg-gray-900 text-white">

    {{-- Cabeçalho com fundo escuro e texto claro --}}
    <header class="bg-gray-800 shadow p-4 mb-6">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">Portfólio</h1>

            {{-- Link para listar projetos --}}
            <a href="{{ route('projects.index') }}" class="text-blue-400 hover:text-blue-500">Projetos</a>
        </div>
    </header>

    {{-- Conteúdo principal --}}
    <main class="container mx-auto">
        @yield('content') {{-- Aqui as views (index, create, edit, etc) serão inseridas --}}
    </main>

</body>
</html>
