<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaLimpiezaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IncidenciasController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('tareas', TareaLimpiezaController::class);
    Route::get('/tareas/{tarea}/estado', [App\Http\Controllers\TareaLimpiezaController::class, 'editStatus'])
        ->name('tareas.editStatus');
    Route::put('/tareas/{tarea}/estado', [App\Http\Controllers\TareaLimpiezaController::class, 'updateStatus'])
         ->name('tareas.updateStatus');
    Route::resource('users', UserController::class);
    Route::resource('incidencias', IncidenciasController::class);
    
    
    
});

require __DIR__.'/auth.php';
