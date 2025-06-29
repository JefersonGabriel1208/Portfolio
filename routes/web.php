<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use App\Models\Project;

// Página inicial pública com listagem dos projetos
Route::get('/', function () {
    $projects = Project::latest()->get();
    return view('home', compact('projects'));
});

// Página de detalhes de um projeto – pública
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');

// Dashboard (restrita a usuários logados)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rotas protegidas por login
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Aqui ativa TODAS as rotas do CRUD de projetos (exceto a de "show", que já está pública acima)
    Route::resource('projects', ProjectController::class)->except(['show']);
});

require __DIR__.'/auth.php';
