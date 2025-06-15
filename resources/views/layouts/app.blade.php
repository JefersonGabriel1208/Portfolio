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
<body class="bg-gray-100 text-gray-900">

    {{-- Cabeçalho simples --}}
    <header class="bg-white shadow p-4 mb-6">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">Portfólio</h1>
            <a href="{{ route('projects.index') }}" class="text-blue-600 hover:underline">Projetos</a>
        </div>
    </header>

    {{-- Conteúdo principal --}}
    <main class="container mx-auto">
        @yield('content') {{-- Aqui o conteúdo das views será inserido --}}
    </main>

</body>
</html>
