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

// Rota pública para ver detalhes do projeto
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');

// Rotas de registro de usuários (públicas)
Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');

// Dashboard (somente para logados)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Rotas protegidas (somente para logados)
Route::middleware(['auth'])->group(function () {
    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD de projetos (exceto o show)
    Route::resource('projects', ProjectController::class)->except(['show']);
});

require __DIR__.'/auth.php';
