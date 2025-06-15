<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use App\Models\Project;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    $projects = Project::latest()->get(); // Busca os projetos do mais novo ao mais antigo
    return view('home', compact('projects')); // Retorna a view resources/views/home.blade.php
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('projects', ProjectController::class);

});

require __DIR__.'/auth.php';
