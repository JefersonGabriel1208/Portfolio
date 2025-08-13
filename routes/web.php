<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use App\Models\Project;
use App\Http\Controllers\Auth\RegisteredUserController;

// Página inicial pública
Route::get('/', function () {
    $projects = Project::latest()->get();
    return view('home', compact('projects'));
});

// Rotas de registro de usuários (públicas)
Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');

// Rotas protegidas (somente para logados)
Route::middleware(['auth'])->group(function () {
    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rotas de CRUD de projetos (manuais)
    // A rota de criação precisa vir antes da rota de exibição de projetos individuais.
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
});

// A rota pública para ver detalhes de um projeto (mais genérica)
// deve vir depois das rotas mais específicas.
Route::get('/projects/{project}', [ProjectController::class, 'show'])
    ->name('projects.show');

require __DIR__.'/auth.php';