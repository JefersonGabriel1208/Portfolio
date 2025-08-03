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

//rotas para registro de usuários
Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');


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
