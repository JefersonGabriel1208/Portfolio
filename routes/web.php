<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use App\Models\Project;

// Página inicial pública
Route::get('/', function () {
    $projects = Project::latest()->get();
    return view('home', compact('projects'));
});

// Detalhes de projeto (público)
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');

// Dashboard (restrita a usuários logados)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Rotas protegidas (só para usuários logados)
Route::middleware(['auth'])->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD de projetos (completo)
    Route::resource('projects', ProjectController::class)->except(['show']);
});

require __DIR__.'/auth.php';
?>
